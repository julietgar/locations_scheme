define({ "api": [
  {
    "type": "delete",
    "url": "/countries",
    "title": "Delete",
    "name": "Delete",
    "group": "Country",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept_Value",
            "description": "<p>application/json</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Content-Type",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Country ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response",
            "description": "<p>Response about delete.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "error",
            "description": "<p>Error about delete.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"response\": \"The country has been deleted correctly.\",\n   \"error\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/CountriesController.php",
    "groupTitle": "Country"
  },
  {
    "type": "get",
    "url": "/countries/{country?}",
    "title": "Detail",
    "name": "Detail",
    "group": "Country",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept_Value",
            "description": "<p>application/json</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Content-Type",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "country",
            "description": "<p>Country name.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "response",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.id",
            "description": "<p>The country ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response.name",
            "description": "<p>The country name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.created_at",
            "description": "<p>Date registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.updated_at",
            "description": "<p>Date updated.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"response\": [\n     {\n         \"id\": 5,\n         \"name\": \"Venezuela\",\n         \"created_at\": \"2018-02-25 07:22:21\",\n         \"updated_at\": \"2018-02-25 07:43:16\"          \n     }\n   ],\n   \"error\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/CountriesController.php",
    "groupTitle": "Country"
  },
  {
    "type": "get",
    "url": "/countries",
    "title": "List",
    "name": "List",
    "group": "Country",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept_Value",
            "description": "<p>application/json</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Content-Type",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "response",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.id",
            "description": "<p>The country ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response.name",
            "description": "<p>The country name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.created_at",
            "description": "<p>Date registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.updated_at",
            "description": "<p>Date updated.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"response\": [\n     {\n         \"id\": 5,\n         \"name\": \"Venezuela\",\n         \"created_at\": \"2018-02-25 07:22:21\",\n         \"updated_at\": \"2018-02-25 07:43:16\"          \n     },\n     {\n         \"id\": 6,\n         \"name\": \"Argentina\",\n         \"created_at\": \"2018-02-23 07:22:21\",\n         \"updated_at\": \"2018-02-24 07:43:16\"          \n     }     \n   ],\n   \"error\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/CountriesController.php",
    "groupTitle": "Country"
  },
  {
    "type": "post",
    "url": "/countries",
    "title": "Register",
    "name": "Register",
    "group": "Country",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept_Value",
            "description": "<p>application/json</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Content-Type",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>User name.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response",
            "description": "<p>Response about register.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "error",
            "description": "<p>Error about register.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"response\": \"The country has been registered correctly.\",\n   \"error\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/CountriesController.php",
    "groupTitle": "Country"
  },
  {
    "type": "put",
    "url": "/countries",
    "title": "Update",
    "name": "Update",
    "group": "Country",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept_Value",
            "description": "<p>application/json</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Content-Type",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Country ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Country name.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response",
            "description": "<p>Response about update.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "error",
            "description": "<p>Error about update.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"response\": \"The country has been updated correctly.\",\n   \"error\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/CountriesController.php",
    "groupTitle": "Country"
  },
  {
    "type": "delete",
    "url": "/countries/locations",
    "title": "Delete",
    "name": "Delete",
    "group": "Location",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept_Value",
            "description": "<p>application/json</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Content-Type",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "location_id",
            "description": "<p>Location ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "response",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.id",
            "description": "<p>The country ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response.name",
            "description": "<p>The country name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.created_at",
            "description": "<p>Date registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.updated_at",
            "description": "<p>Date updated.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "response.locations",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.id",
            "description": "<p>The location ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.countries_id",
            "description": "<p>The country ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response.locations.field",
            "description": "<p>The location field name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.sort",
            "description": "<p>Hierarchy of a location.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.locations.created_at",
            "description": "<p>Date registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.locations.updated_at",
            "description": "<p>Date updated.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"response\": \"The location has been deleted correctly.\",\n   \"error\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/LocationsController.php",
    "groupTitle": "Location"
  },
  {
    "type": "get",
    "url": "/countries/{country}/locations/{location?}",
    "title": "Detail",
    "name": "Detail",
    "group": "Location",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept_Value",
            "description": "<p>application/json</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Content-Type",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "country_id",
            "description": "<p>Country ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "location_id",
            "description": "<p>Location ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "response",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.id",
            "description": "<p>The country ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response.name",
            "description": "<p>The country name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.created_at",
            "description": "<p>Date registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.updated_at",
            "description": "<p>Date updated.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "response.locations",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.id",
            "description": "<p>The location ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.countries_id",
            "description": "<p>The country ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response.locations.field",
            "description": "<p>The location field name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.sort",
            "description": "<p>Hierarchy of a location.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.locations.created_at",
            "description": "<p>Date registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.locations.updated_at",
            "description": "<p>Date updated.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"response\": [\n     {\n         \"id\": 5,\n         \"name\": \"Venezuela\",\n         \"created_at\": \"2018-02-25 07:22:21\",\n         \"updated_at\": \"2018-02-25 07:43:16\",\n         \"locations\": [\n             {\n                 \"id\": 4,\n                 \"countries_id\": 5,\n                 \"field\": \"Municipio\",    \n                 \"sort\": 2,     \n                 \"created_at\": \"2018-02-25 07:22:21\",\n                 \"updated_at\": \"2018-02-25 07:43:16\"     \n             }          \n         ]               \n     },\n     {\n         \"id\": 6,\n         \"name\": \"Argentina\",\n         \"created_at\": \"2018-02-23 07:22:21\",\n         \"updated_at\": \"2018-02-24 07:43:16\",\n         \"locations\": []          \n     }     \n   ],\n   \"error\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/LocationsController.php",
    "groupTitle": "Location"
  },
  {
    "type": "get",
    "url": "/countries/locations/all",
    "title": "List",
    "name": "List",
    "group": "Location",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept_Value",
            "description": "<p>application/json</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Content-Type",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "response",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.id",
            "description": "<p>The country ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response.name",
            "description": "<p>The country name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.created_at",
            "description": "<p>Date registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.updated_at",
            "description": "<p>Date updated.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "response.locations",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.id",
            "description": "<p>The location ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.countries_id",
            "description": "<p>The country ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response.locations.field",
            "description": "<p>The location field name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.sort",
            "description": "<p>Hierarchy of a location.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.locations.created_at",
            "description": "<p>Date registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.locations.updated_at",
            "description": "<p>Date updated.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"response\": [\n     {\n         \"id\": 5,\n         \"name\": \"Venezuela\",\n         \"created_at\": \"2018-02-25 07:22:21\",\n         \"updated_at\": \"2018-02-25 07:43:16\",\n         \"locations\": [\n             {\n                 \"id\": 4,\n                 \"countries_id\": 5,\n                 \"field\": \"Municipio\",    \n                 \"sort\": 2,     \n                 \"created_at\": \"2018-02-25 07:22:21\",\n                 \"updated_at\": \"2018-02-25 07:43:16\"     \n             },\n             {\n                 \"id\": 5,\n                 \"countries_id\": 5,\n                 \"field\": \"Estado\",    \n                 \"sort\": 1,     \n                 \"created_at\": \"2018-02-25 07:23:21\",\n                 \"updated_at\": \"2018-02-25 07:43:16\"     \n             },\n             {\n                 \"id\": 6,\n                 \"countries_id\": 5,\n                 \"field\": \"Ciudad\",    \n                 \"sort\": 3,     \n                 \"created_at\": \"2018-02-25 07:24:21\",\n                 \"updated_at\": \"2018-02-25 07:43:16\"     \n             }             \n         ]               \n     },\n     {\n         \"id\": 6,\n         \"name\": \"Argentina\",\n         \"created_at\": \"2018-02-23 07:22:21\",\n         \"updated_at\": \"2018-02-24 07:43:16\",\n         \"locations\": []          \n     }     \n   ],\n   \"error\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/LocationsController.php",
    "groupTitle": "Location"
  },
  {
    "type": "post",
    "url": "/countries/locations",
    "title": "Register",
    "name": "Register",
    "group": "Location",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept_Value",
            "description": "<p>application/json</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Content-Type",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "country_id",
            "description": "<p>Country ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>Location field name.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "sort",
            "description": "<p>Hierarchy of a location.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "response",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.id",
            "description": "<p>The country ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response.name",
            "description": "<p>The country name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.created_at",
            "description": "<p>Date registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.updated_at",
            "description": "<p>Date updated.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "response.locations",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.id",
            "description": "<p>The location ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.countries_id",
            "description": "<p>The country ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response.locations.field",
            "description": "<p>The location field name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.sort",
            "description": "<p>Hierarchy of a location.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.locations.created_at",
            "description": "<p>Date registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.locations.updated_at",
            "description": "<p>Date updated.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"response\": \"The location has been registered correctly.\",\n   \"error\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/LocationsController.php",
    "groupTitle": "Location"
  },
  {
    "type": "put",
    "url": "/countries/locations",
    "title": "Update",
    "name": "Update",
    "group": "Location",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Value is Bearer and add the token user login. Example: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Accept_Value",
            "description": "<p>application/json</p>"
          },
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Content-Type",
            "description": "<p>application/json</p>"
          }
        ]
      }
    },
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "location_id",
            "description": "<p>Location ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "field",
            "description": "<p>Location field name.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "sort",
            "description": "<p>Hierarchy of a location.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "response",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.id",
            "description": "<p>The country ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response.name",
            "description": "<p>The country name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.created_at",
            "description": "<p>Date registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.updated_at",
            "description": "<p>Date updated.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "response.locations",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.id",
            "description": "<p>The location ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.countries_id",
            "description": "<p>The country ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response.locations.field",
            "description": "<p>The location field name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "response.locations.sort",
            "description": "<p>Hierarchy of a location.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.locations.created_at",
            "description": "<p>Date registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "response.locations.updated_at",
            "description": "<p>Date updated.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n   \"response\": \"The location has been updated correctly.\",\n   \"error\": []\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/LocationsController.php",
    "groupTitle": "Location"
  },
  {
    "type": "post",
    "url": "/login",
    "title": "Login",
    "name": "Login",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email user.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password user.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "success",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "success.token",
            "description": "<p>Token of the User registered.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"success\": {\n     \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy\"\n  }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/UserController.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "/register",
    "title": "Register",
    "name": "Register",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>User name.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email user. This is unique.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password user.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "c_password",
            "description": "<p>Repeat password user.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "success",
            "description": "<p>List of options (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "success.token",
            "description": "<p>Token of the User registered.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "success.name",
            "description": "<p>Name of the User registered.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"success\": {\n     \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyMjhjM2U3MzExODQy\",\n     \"name\": \"Maria\"\n  }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/UserController.php",
    "groupTitle": "User"
  }
] });
