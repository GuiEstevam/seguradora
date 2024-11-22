<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Http\Resources\ResultUnifiedSerializer;

class ResultUnifiedSerializerTest extends TestCase
{
    public function testSerialization()
    {
        $json = '{
            "statusCode": 200,
            "solicitationID": "12345",
            "resultDProcesso": {
                "dataValidation": {
                    "cpf": "12345678900",
                    "birthDate": "1990-01-01",
                    "name": "John Doe",
                    "rg": "MG1234567",
                    "mother": "Jane Doe",
                    "deathFlag": "N"
                },
                "processResultMessage": "Process completed successfully",
                "process": [
                    {
                        "number": "123",
                        "uf": "MG",
                        "date": "2023-01-01",
                        "area": "Civil",
                        "classDescription": "Class A",
                        "situation": "Active",
                        "districtProcess": "District 1",
                        "court": "Court 1",
                        "parts": [
                            {
                                "name": "John Doe",
                                "analyzedPart": true,
                                "cpf": "12345678900",
                                "birthDate": "1990-01-01",
                                "type": "Plaintiff",
                                "situation": "Active",
                                "motherName": "Jane Doe",
                                "rgNumber": "MG1234567",
                                "rgUf": "MG",
                                "totalDays": 30,
                                "sentenceDate": "2023-01-01",
                                "endOfSentenceDate": "2023-01-31",
                                "prisionDate": "2023-01-01",
                                "releaseDate": "2023-01-31",
                                "heinousCrime": false
                            }
                        ],
                        "subjects": [
                            "Subject 1",
                            "Subject 2"
                        ],
                        "policeDistrictData": [
                            {
                                "district": "District 1",
                                "locality": "Locality 1",
                                "city": "City 1",
                                "uf": "MG",
                                "documentNumber": "123456",
                                "documentType": "Type 1",
                                "blatant": false
                            }
                        ],
                        "articles": [
                            {
                                "code": "A1",
                                "sequence": "1",
                                "description": "Description 1",
                                "classificationCode": "C1",
                                "classificationDescription": "Classification 1",
                                "groupDescription": "Group 1",
                                "groupCode": "G1"
                            }
                        ]
                    }
                ],
                "specialAnalysis": {
                    "resultSpecialAnalysisMessage": "Special analysis completed",
                    "results": [
                        {
                            "date": "2023-01-01",
                            "summary": "Summary 1",
                            "qualification": "Qualification 1",
                            "city": "City 1",
                            "uf": "MG"
                        }
                    ]
                },
                "anttResult": {
                    "resultFound": true,
                    "transporterName": "Transporter 1",
                    "typeRntrc": "Type 1",
                    "document": "Document 1",
                    "rntrcNumber": "123456",
                    "anttSituation": "Active",
                    "registrationDate": "2023-01-01",
                    "city": "City 1",
                    "ufRntrc": "MG",
                    "transporterMessage": "Message 1"
                }
            },
            "resultDCNH": {
                "faceBase64": "base64string",
                "validationStatusDocumentImage": 1,
                "validationStatusCnh": 1,
                "validationStatusSecurityNumber": 1,
                "validationStatusUf": 1,
                "validationImageMessage": "Valid",
                "renachNumber": "123456",
                "registerNumber": "123456",
                "category": "B",
                "name": "John Doe",
                "rgNumber": "MG1234567",
                "ufRg": "MG",
                "emissorRg": "SSP",
                "cpf": "12345678900",
                "birthDate": "1990-01-01",
                "issuanceDate": "2023-01-01",
                "firstLicenseDate": "2010-01-01",
                "expiryDate": "2025-01-01",
                "performsPaidActivity": "N",
                "moopCourse": "N",
                "localIssuance": "City 1",
                "observation": "None",
                "securityNumber": "123456",
                "ordinance": "Ordinance 1",
                "restriction": "None",
                "mirrorNumber": "123456",
                "totalPoints": "0",
                "statusCNHImage": "Valid",
                "statusMessageCNHImage": "Valid",
                "base64CNHImage": "base64string",
                "infractions": {
                    "infractions": [
                        {
                            "vehiclePlate": "ABC1234",
                            "authorBody": "Author 1",
                            "autoInfractionNumber": "123456",
                            "infractionCode": "I1",
                            "infractionDate": "2023-01-01",
                            "infractionHour": "12:00",
                            "registerInfractionDate": "2023-01-01",
                            "registerInfractionHour": "12:00",
                            "infractionPoints": "3",
                            "infractionSituation": "Active",
                            "infractionCodeType": "Type 1",
                            "infractionArticle": "Article 1",
                            "infractionDescription": "Description 1",
                            "infractionPlace": "Place 1",
                            "infractionObservation": "Observation 1",
                            "infractionTypeAuthor": "Author 1",
                            "authorPresentation": "Presentation 1",
                            "infractionCounty": "County 1",
                            "infractionSerie": "Serie 1",
                            "infractionAppealDeadlineDate": "2023-01-31"
                        }
                    ]
                },
                "suspensions": {
                    "suspensions": [
                        {
                            "suspensionReason": "Reason 1",
                            "suspesionProcess": "Process 1",
                            "suspensionDate": "2023-01-01",
                            "suspensionDeadlineDate": "2023-01-31",
                            "suspensionSituation": "Active",
                            "suspensionSituationRecicle": "Recicle 1"
                        }
                    ]
                },
                "anttResult": {
                    "resultFound": true,
                    "transporterName": "Transporter 1",
                    "typeRntrc": "Type 1",
                    "document": "Document 1",
                    "rntrcNumber": "123456",
                    "anttSituation": "Active",
                    "registrationDate": "2023-01-01",
                    "city": "City 1",
                    "ufRntrc": "MG",
                    "transporterMessage": "Message 1"
                }
            },
            "resultsDVeiculos": [
                {
                    "indexVehicle": 1,
                    "plateVehicle": "ABC1234",
                    "CRVNumber": "123456",
                    "manufactureYear": "2020",
                    "licensingYear": "2021",
                    "modelYear": "2020",
                    "gearBox": "Automatic",
                    "weightCapacity": "1000kg",
                    "passengerCapacity": "5",
                    "chassi": "1234567890",
                    "cylinderCapacity": "2000cc",
                    "cmt": "CMT1",
                    "fuel": "Gasoline",
                    "color": "Red",
                    "transferDate": "2023-01-01",
                    "licensingDate": "2023-01-01",
                    "lesseDocument": "Document 1",
                    "ownerDocument": "Document 2",
                    "securityDocument": "Document 3",
                    "validationDocument": "Document 4",
                    "vehicleSpecie": "Specie 1",
                    "noticeOfSale": "Notice 1",
                    "trafficTicketRestriction": "None",
                    "recallRestriction": "None",
                    "renajudRestriction": "None",
                    "brandModel": "Brand 1",
                    "mouting": "Mounting 1",
                    "motor": "Motor 1",
                    "county": "County 1",
                    "previousCounty": "County 2",
                    "lesseeName": "Lessee 1",
                    "ownerName": "Owner 1",
                    "bodyNumber": "123456",
                    "axisNumber": "2",
                    "auxAxixNumber": "1",
                    "grossTotalWeight": "1500kg",
                    "vehiclePlate": "ABC1234",
                    "previousVehiclePlate": "XYZ5678",
                    "pontecy": "Pontecy 1",
                    "origin": "Origin 1",
                    "chassisMarkup": "Markup 1",
                    "renavam": "123456",
                    "restriction": "None",
                    "licensingStatus": "Active",
                    "situation": "Active",
                    "vehicleType": "Type 1",
                    "uf": "MG",
                    "previousUf": "SP",
                    "activeTheftIncident": false,
                    "occurrenceDetail": {
                        "occurrences": [
                            {
                                "ocurrenceCategory": "Category 1",
                                "occurrenceDate": "2023-01-01",
                                "occurrenceType": "Type 1",
                                "agencyUf": "MG",
                                "occurrenceNumber": "123456",
                                "agency": "Agency 1"
                            }
                        ]
                    },
                    "infractionDetail": {
                        "infractions": [
                            {
                                "infractionClassification": "Classification 1",
                                "descriptionCode": "Code 1",
                                "authorBodyCode": "Author 1",
                                "complementInfractionPlace": "Place 1",
                                "infractionDate": "2023-01-01",
                                "registrationInfractionDate": "2023-01-01",
                                "defenseDeadlineDate": "2023-01-31",
                                "appealClosingDate": "2023-01-31",
                                "description": "Description 1",
                                "complementDescription": "Complement 1",
                                "hourInfraction": "12:00",
                                "registerHourInfraction": "12:00",
                                "infractionPlace": "Place 1",
                                "complementNoticeNumber": "123456",
                                "infractionNoticeNumber": "123456",
                                "processingNumber": "123456",
                                "renainfNumber": "123456",
                                "authorBody": "Author 1",
                                "infractionSituation": "Active",
                                "infractionType": "Type 1",
                                "infractionValue": "100.00"
                            }
                        ]
                    },
                    "renajudDetail": {
                        "restrictions": [
                            {
                                "restriction": "Restriction 1",
                                "observation": "Observation 1",
                                "tribunal": "Tribunal 1",
                                "processNumber": "123456",
                                "blockType": "Type 1",
                                "failureType": "Type 1",
                                "situation": "Active",
                                "searchAndSeizure": "None",
                                "judiciaryBody": "Body 1",
                                "complement": "Complement 1",
                                "registerDateTime": "2023-01-01T12:00:00"
                            }
                        ]
                    },
                    "anttResponse": {
                        "resultFound": true,
                        "city": "City 1",
                        "registrationDate": "2023-01-01",
                        "typeRntrc": "Type 1",
                        "document": "Document 1",
                        "transporterMessage": "Message 1",
                        "vehicleMessage": "Message 2",
                        "transporterName": "Transporter 1",
                        "rntrcNumber": "123456",
                        "anttSituation": "Active",
                        "vehicleAnttSituation": "Active",
                        "ufRntrc": "MG",
                        "expirationDate": "2023-12-31"
                    },
                    "specialAnalysis": {
                        "resultSpecialAnalysisMessage": "Special analysis completed",
                        "results": [
                            {
                                "date": "2023-01-01",
                                "summary": "Summary 1",
                                "qualification": "Qualification 1",
                                "city": "City 1",
                                "uf": "MG"
                            }
                        ]
                    }
                }
            ]
        }';

        // Deserializar o JSON em um objeto PHP
        $data = json_decode($json, true);
        $serializedResponse = ResultUnifiedSerializer::fromArray($data);

        // Serializar de volta para JSON
        $resultJson = json_encode($serializedResponse->toArray(null));

        // Verificar se a serialização de volta para JSON produz o resultado esperado
        $this->assertJsonStringEqualsJsonString($json, $resultJson);
    }
}
