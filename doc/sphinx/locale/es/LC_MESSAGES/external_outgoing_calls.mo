��    S      �              L  T   M  �   �  �   n  h     s   }  S   �  q   E  x   �     0	  7   �	  K   �	  a   4
  ~   �
  %     �   ;  �   �  �   _  �     (  �  �   �  c   V  c   �  J        i     �     �  	   �  	   �  G   �        1     A   B  F   �  �   �  }   S  �   �  h   S  T   �  {     �   �     w     �     �     �  �   �  z   N  �   �     N     i    z     �     �     �     �     �  '        <     R  �   b  �   �  �   �  �   =  �   �  l   }  !   �  �     q   �  �     U   �  A   �  6   6  �   m  �   T   �   !  �   �!  *   �"  B   �"  >   &#     e#  �   �#     $  {   #$  r  �$  _   &  �   r&  �   n'  �   (  y   �(  z   y)  �   �)  �   v*  �   +  ?   �+  F   �+  F   2,  �   y,  !   -  �   --  �   	.  �   �.  �   0/    �/  �   �0  y   �1  \   2  d   _2     �2     �2     �2  	   �2  	   	3  �   3     �3  5   �3  d   �3  Y   G4  �   �4  �   /5  �   �5  �   �6  i   7  �   z7  �   8     9     9     59  "   >9  �   a9  �   �9  �   k:     ;     ;  (  *;  	   S<     ]<     }<     �<     �<  .   �<     =     =  �   3=  �   �=  �   ^>  �   1?  �   �?  ~   h@  #   �@  �   A  �   �A  �   HB  �   �B  M   hC  1   �C  �   �C  �   �D    �E  �   �F  4   ~G  ?   �G  K   �G  +   ?H  �   kH     I  q   I   **Billing a call** is the action of **assigning price** to a call that implies cost. **IvozProvider checks live that a call can be billed when it is established** to avoid placing calls that imply cost but won't be billed because Brand Operator, due to a mistake, hasn't assigned a price. **To sum up**, when a user dials an external number, IvozProvider looks up a matching target pattern to decide which PeeringContract must be used to place this call. *Load-balancing* lets us distribute calls matching the same pattern using several valid outgoing routes. A **Pricing plan** determines the price of a type of call (of a pricing pattern) and is configured in this section: A call is considered billable if there is a pricing pattern that matches this call. A specific **pricing plan** can be linked to 'n' companies and the *brand operator* is responsible for this task. All calls matching theese routes will try to use route A. In case the call fails, the call will be placed using route B. Although given examples use two routes, more routes can be chained and failover and load-balancing estrategies can be combined. And we add the **pricing patter** we have just created: And we can check that it matches the **precing plan** we have just created: And we confirm that it will be billed with the pricing plan that we have just created and linked: As we will see in :ref:`rutas salientes <outgoing_routes>` section, every target pattern will be linked to a Peering Contract. Assigning a pricing plan to a company At this point of the configuration, we have to configure IvozProvider to use the already configured *Contract Peering* to place the external calls we are making. At this point, *Alice* should be able to make outgoing calls to spanish destinations and this calls should be billed accordingly. At this point, we are looking forward to make our first outgoing call with our new IvozProvider, we may have even tried to call with current configuration but... Before placing our first outgoing call, it would be desirable to choose the number that the callee will see when the phone rings, so that he can return the call easily. Brand operator can choose between keeping this target pattern if finds them useful or deleting them an creating the ones that meet his needs. In fact, apart from phone prefixes it is also possible to use regular expressions. e.g. Unique target pattern that contains all possible targets: ^[0-9]+$ By default we can see the 254 countries grouped in the continents defined in `ISO 3166 <https://es.wikipedia.org/wiki/ISO_3166>`_: Call matching theese routes will use route A for %33 of the calls and route B for %66 of the calls. Call matching theese routes will use route A for %50 of the calls and route B for %50 of the calls. Calls from users without an outgoing DDI will be rejected by IvozProvider. Creating a pricing pattern Creating a pricing plan Example Example 1 Example 2 Failover route lets us use another route whenever the main route fails. Failover routes Finding a pricing plan for a specific destination Floating number must use the "." as decimal separator (e.g. 0.02) If a call can't be billed, IvozProvider won't allow its establishment. If a call matches several routes with equal priority, metric will determine the proportion of calls that will use one route or another. If a call matches several routes, it will be placed using the outgoing route with lower priority, as long as it is available. If a given call can be billed with more than one active pricing plan, it will be billed using the pricing plan with lower metric. If we choose routing 'Spain' calls only through our *Peering contract*, we will make this configuration: In the section **Brand configuration** > **Companies** we select the *demo* company: Just the way :ref:`target patterns <target_patterns>` exist, **pricing patterns** exist and are configured in this section: Just the way we warned :ref:`when we described the duties of the brand operator <brand_responsibilities>`, the brand operator is **responsible for making all the needed setup so that IvozProvider is able to bill all external calls**. Load balancing Making external calls Metric No pricing plan, no call Notice that using regular expressions instead of prefixes can make a phone number to match more than one target pattern. Use with responsibility. Now we have to tell IvozProvider that calls to 'Spain' or 'Europe' should be established through our **Contract Peering**. On the other hand, if we are more generous and we decide to place calls to all european countries, we would make this configuration: Outgoing DDI configuration Outgoing Routing Pricing patterns section is empty by default, as opposed to target patterns section, that has all the 254 countries of the world. The reason is that pricing pattern will usually imply lots of pattern per country (GSM networks, especial numbers, mobile numbers, fixed lines, etc.). Priority Route A: priority 1, metric 1 Route B: priority 1, metric 1 Route B: priority 1, metric 2 Route B: priority 2, metric 1 Simulating a call of a specific company Target pattern groups Target patterns That's why it can be useful to group the target patterns in **target pattern group** so that we can link a whole group to a Peering Contract more easily. The **Pricing plan** and **Companies** relationship is set for a determined period of time, that's why we have to select *Start time* and *End time*: The **metric** of the link lets you assign more than one *pricing plan* for a company, even though some destinations are included in more than one of those pricing plans. The goal of this section is configuring IvozProvider to make external outgoing calls, taking previous section configuration as a starting point. This allows having a general *Pricing plan* and concrete the price of a specific destination in another *pricing plan* with lower metric (free cell phone calls, for example). This are the key parameters to achieve two interesting features: **load-balancing** and **failover-routes**. This is the goal of this section: To achieve this goal, we have to configure our DDI as *Alice's* **outbound DDI**, because she will be the chosen one to place our first outgoing call: To achieve this, in first place, we need that the dialed external numbers fall in an existing **target pattern**. To achive our goal of making an external call to a spanish number, we didn't have to modify the initial contents of this two sections :) To check the configuration so far we can **find a pricing plan** for a call pressing: To make this assignment, we use the section **Outgoing routing**: Two parameters deserve an explanation in this section: Usually, it will we useful to have one target pattern for the 254 countries defined in the `ISO 3166 <https://es.wikipedia.org/wiki/ISO_3166>`_. That's why IvozProvider automatically includes all this countries and their prefixes: We already have our test call categorized as a call within the **Target pattern** 'Spain'. In addition, we also have a **Target pattern group** including 'Spain', called 'Europe'. We can set this up editing *Alice* in **Company Configuration** > **Users**. If this change is made by brand operator or global operator, he must :ref:`emulate the corresponding company <emulate_company>` previously. We can simulate a call for a given company and check the price it will imply. This way, we can be sure that the configuration is ok and that calls to that destination will be billed using a specific *Pricing plan*: We create a **pricing plan** for our goal: We introduce the destination number in :ref:`E.164 format <e164>`: We will create the pricing plan 'Spain' for our outgoing call: We will follow this steps: When a user dials an external phone number, IvozProvider tries to categorize this call into a one of the target patterns defined in this section: Where do I call? Within this list we can find Spain's prefix, that will be the prefix of the test call we are going to make in this section: Project-Id-Version: IvozProvider 1.0
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2017-01-05 15:46+0100
PO-Revision-Date: YEAR-MO-DA HO:MI+ZONE
Last-Translator: FULL NAME <EMAIL@ADDRESS>
Language-Team: es <LL@li.org>
Plural-Forms: nplurals=2; plural=(n != 1)
MIME-Version: 1.0
Content-Type: text/plain; charset=utf-8
Content-Transfer-Encoding: 8bit
Generated-By: Babel 1.3
  Se entiende por **tarificar** la **acción de poner precio** a una llamada que implique coste. Para evitar que por un descuido el operador de marca no defina el precio para un tipo de llamada y llamadas que implican coste salgan a precio 0, **en el momento del establecimiento de una llamada se comprueba que la llamada se va a poder tarificar**. **En resumen**, cuando un usuario marca un número externo, IvozProvider busca el patrón de destino al que pertenece para saber por dónde tiene que sacar dicha llamada. El balanceo de carga o *load-balancing* nos permite sacar un porcentaje de llamadas por una ruta y otro porcentaje de llamadas por otra ruta, es decir, nos permite repartir las llamadas entre dos o más rutas igualmente válidas. Un **Plan de precio** determina el coste de un tipo de llamada (de un patrón de precio) y se configura en esta sección: Para que una llamada se considere tarificable, tiene que *matchear* con algún patrón de precio dado de alta previamente. Un **plan de precios** concreto se puede vincular a *n* empresas y corresponde al *Operador de marca* realizar esta vinculación. Las llamadas que encajen en ambas rutas se intentarán sacar siempre por la Ruta A. En caso de no error (operador caído, etc.), se intentará sacar por la Ruta B. Tanto el balanceo de carga como las rutas de fallo permiten encadenar/utilizar más de 2 rutas, aunque en los ejemplo se hayan utilizado solo 2. Y le añadimos el **patrón de precio** que hemos creado antes: Y vemos que *matchea* con el **plan de precio** que acabamos de crear: Y vemos que *matchea* con el **plan de precio** que acabamos de crear: Como veremos en la sección de :ref:`rutas salientes <outgoing_routes>`, cada patrón de destino se vinculará a un Contrato de Peering concreto. Vincular plan de precio a empresa En este punto de la configuración, tenemos que configurar IvozProvider para que las llamadas a los destinos externos que vayamos a probar salgan por el Contrato de *peering* que hemos configurado en el bloque anterior. En este punto, *Alice* debería de ser capaz de realizar llamadas nacionales externas, que se tendrían que cursar y tarificar con normalidad. Llegados a este punto y estando deseosos como estamos de hacer nuestra primera llamada, habremos intentando llamar con la configuración actual pero... Antes de realizar la llamada externa, estaría muy bien que dicha llamada se presentara con el DDI que ya hemos configurado en entrada, así el llamado podría devolvernos la llamada cómodamente. Cada operador de marca puede elegir mantener estos patrones o borrarlos y crear los que le interesen. De hecho, aparte de prefijos, también se pueden definir expresiones regulares. e.g. Queremos crear un único patrón que englobe todas las llamadas: ^[0-9]+$. Por defecto aparecen los 254 países agrupados en base a su continente definidos en la `ISO 3166 <https://es.wikipedia.org/wiki/ISO_3166>`_: Las llamadas que encajen en ambas rutas se sacaran el 33% por la Ruta A y el 66%por la Ruta B (el doble por B que por A). Las llamadas que encajen en ambas rutas se sacaran el 50% por una ruta y el 50% por la otra. Sin configurar un DDI saliente para el usuario que realiza la llamada, ésta no saldrá al exterior. Crear un patrón de precio Crear un plan de precio Ejemplo Ejemplo 1 Ejemplo 2 Las rutas en caso de fallo o *failover-routes* nos permite disponer de una ruta adicional en caso de que la ruta preferida falle. Conmutación por error Encontrar un plan de precios para un destino concreto Los números decimales se tienen que introducir utilizando el "." como separador decimal (e.g. 0.02) Si una llamada no se va a poder tarificar, IvozProvider no permitirá su establecimiento. Si una llamada concreta encaja con rutas con la misma prioridad, la métrica determina cuántas se sacarán por una ruta y cuántas por otra. Si una llamada concreta encaja con rutas de distinta prioridad, la llamada se sacará por la que menor prioridad tenga siempre y cuando esté disponible. Una llamada que puede tarificarse en base a más de un plan de    precio vinculado a una empresa y activo en un momento dado lo hará en base al    plan de precio con menor métrica. Si optamos por enrutar solamente las llamadas de España por nuestro Contrato de *peering*, tendremos que realizar la siguiente configuración: Para ello, desde la sección **Configuración de Marca** > **Empresas**, seleccionando la empresa *demo*: Del mismo modo que existen los :ref:`patrones de destino <target_patterns>`, existen los **patrones de precio** y se configuran en esta sección: Tal y como advertimos :ref:`cuando describimos las funciones del operador de marca <brand_responsibilities>`, el operador de marca era el **responsable de realizar la configuración necesaria para que todas las llamadas externas se puedan tarificar**. Balanceo de carga Realizar llamadas externas Métrica Sin plan de precio, no hay llamada Crear patrones de destino en base a expresiones regulares puede provocar que un número encaje en 2 patrones. Usar con responsabilidad. Ahora solo nos falta decir a IvozProvider que las llamadas de 'España' o de 'Europa' salgan por nuestro **Contrato de peering**. Por el contrario, si somos más generosos y decidimos permitir todas las llamadas a países europeos, la configuración a aplicar sería la siguiente: Configurar DDI saliente Rutas salientes A diferencia de los patrones de destino, que vienen precreados con los 254 países del mundo, los patrones de precio no se crean ya que lo habitual es que un país se divida en muchos patrones de precio (redes GSM de un operador, numeraciones especiales, números fijos, números móviles, etc.). Prioridad Ruta A: prioridad 1, métrica 1 Ruta B: prioridad 1, métrica 1 Ruta B: prioridad 1, métrica 2 Ruta B: prioridad 2, métrica 1 Simular una llamada desde una empresa concreta Grupos de patrones Patrones de destino Por este motivo, puede ser interesante agrupar los patrones en grupos y así poder vincular un grupo entero a un Contrato de Peering. La vinculación de **Planes de precio** y **Empresas** es efectiva en un período de tiempo concreto, de ahí que haya que seleccionar *Fecha inicio* y *Fecha fin*: La **metrica** de la vinculación permite vincular más de un *plan de precios* a una empresa de forma coincidente en el tiempo, aunque ciertos destinos estén incluidos en más de uno de esos planes de precio. El objetivo de este bloque será configurar IvozProvider para realizar llamadas externas salientes, partiendo de la configuración realizada hasta este momento. Esto permite tener un *Plan de precios* general y matizar el coste de algún tipo de llamada en otro *Plan de precio* (móviles gratis, por ejemplo). Estos dos parámetros son clave para conseguir dos funcionalidades muy interesantes: **load-balancing** y **failover-routes**. Para ello se utiliza esta sección: Para ello, basta con configurar dicho DDI como **DDI saliente** de *Alice*, que será la elegida para realizar la primera llamada saliente de nuestro recién instalado IvozProvider: Para ello, en primer lugar, necesitamos que los números externos recaigan en un **patrón de destino** dado de alta con anterioridad. Para conseguir nuestro objetivo de llamar a un número español, no hemos tenido que modificar el contenido de partida de estas dos secciones :) Para comprobar que hasta este punto la configuración es correcta, podemos **encontrar un plan de precio** para una llamada concreta pulsando: Para realizar esta vinculación, accedemos a la sección **Rutas salientes**: Existen dos parámetros que merecen explicación: Lo más normal será que nos interese tener un patrón de destino por cada uno delos 254 países definidos en la `ISO 3166 <https://es.wikipedia.org/wiki/ISO_3166>`_. Por ese motivo, IvozProvider incluye estos países y sus prefijos de forma automática: Ya tenemos nuestra llamada de pruebas categorizada dentro del **Patrón de destino** 'España'. Es más, también tenemos un **Grupo de patrones de destino** que incluye 'España', 'Europa'. Esta configuración se realiza desde **Configuración de empresa** > **Usuarios**, editando el usuario de *Alice*. Si el operador de marca o el operador global el que realiza esta edición, tendrá que haber :ref:`emulado la empresa <emulate_company>` previamente. Del mismo modo que al crear un *Plan de precios* hemos comprobado que a nuestra llamada aplicaba dicho plan, podemos simular una llamada concreta en una empresa concreta y saber qué coste se le aplicaría: Creamos un **plan de precio** para nuestro objetivo: Introducimos el número destino en :ref:`formato E.164 <e164>`: Creemos el patrón de precio *Spain* para nuestra llamada saliente externa: Para ello, seguiremos los siguientes pasos: Cuando un usuario marca un número externo, IvozProvider intenta calificar  estenúmero en uno de los patrones de destino definidos en esta sección: ¿A dónde llamo? Dentro de este listado aparece el prefijo de España, que será el grupo del número que probemos en este bloque: 