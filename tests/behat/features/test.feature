Feature: Check that environment loader scans it properly
  Scenario: Try execute steps from couple extensions which are used environment loader
    # Try execute step from SoapExtension.
    Given I am working with SOAP service WSDL "http://wsf.cdyne.com/WeatherWS/Weather.asmx?WSDL"
    # Try execute step from TqExtension.
    And wait 1 seconds
