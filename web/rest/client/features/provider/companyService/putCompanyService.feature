Feature: Update company services
  In order to manage company services
  As an super admin
  I need to be able to update them through the API.

  @createSchema
  Scenario: Update an company services
    Given I add Authorization header
     When I add "Content-Type" header equal to "application/json"
      And I add "Accept" header equal to "application/json"
      And I send a "PUT" request to "/company_services/1" with body:
    """
      {
          "code": "92",
          "company": 2,
          "service": 4
      }
    """
    Then the response status code should be 200
     And the response should be in JSON
     And the header "Content-Type" should be equal to "application/json; charset=utf-8"
     And the JSON should be like:
    """
      {
          "code": "92",
          "id": 1,
          "company": "~",
          "service": {
              "iden": "RecordLocution",
              "defaultCode": "00",
              "extraArgs": true,
              "id": 4,
              "name": {
                  "en": "en",
                  "es": "en"
              },
              "description": {
                  "en": "en",
                  "es": "en"
              }
          }
      }
    """
