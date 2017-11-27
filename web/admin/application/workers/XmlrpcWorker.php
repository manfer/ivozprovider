<?php

class XmlrpcWorker extends Iron_Gearman_Worker
{
    /** @var  \Ivoz\Core\Application\Service\DataGateway */
    protected $dataGateway;

    protected function initRegisterFunctions()
    {
        $this->_registerFunction = array(
            'sendXMLRPC' => 'sendXMLRPC',
        );
    }

    protected function init()
    {
        if (\Zend_Registry::isRegistered("data_gateway")) {
            $this->dataGateway = \Zend_Registry::get("data_gateway");
        }
    }

    public function sendXMLRPC(\GearmanJob $serializedJob)
    {
        // Thanks Gearmand, you've done your job
        $serializedJob->sendComplete("DONE");

        /** @var \IvozProvider\Gearmand\Jobs\Xmlrpc $job */
        $job = igbinary_unserialize($serializedJob->workload());
        $rpcEntity = $job->getRpcEntity();
        $rpcPort = $job->getRpcPort();
        $rpcMethod = $job->getRpcMethod();

        // Get servers to send the XmlRpcRequest
        $servers = $this->dataGateway->findAll($rpcEntity);

        foreach ($servers as $server) {
            try {
                // Create a new XmlRpc client for each server
                $client = new \Zend_XmlRpc_Client('http://' . $server->getIp() . ":$rpcPort/RPC2");
                $client->call($rpcMethod);

                $this->_logger->log(
                    sprintf("[XMLRPC] Request %s sent to %s [%s:%d]",
                        $rpcMethod,
                        $server->getName(),
                        $server->getIp(),
                        $rpcPort
                    ),
                    Zend_Log::INFO
                );

            } catch (\Exception $e) {
                $this->_logger->log(
                    sprintf("[XMLRPC] Unable to send request %s to server %s [%s:%d]",
                        $rpcMethod,
                        $server->getName(),
                        $server->getIp(),
                        $rpcPort
                    ),
                    Zend_Log::ERR
                );
            }
        }
    }
}