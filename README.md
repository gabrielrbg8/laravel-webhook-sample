### Webhooks
Endpoints to manage webhooks.


```http
POST /api/webhooks
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `partner` | `string` | **Required**. Partner name or ID |
| `event_id` | `string` | **Required**. Event ID, sample: 6D5B6D84X984 |
| `event` | `string` | **Required**. Event type, sample: PIX_CASH_IN |
| `desription` | `string` | **Required**. Event description, sample: 'Pix received' |

### Response

```javascript
{
  "message" : string
}
```

The `message` attribute contains a message commonly used to indicate errors or, in the case of deleting a resource, success that the resource was properly deleted.

### Activity Logs
Endpoints to manage activity logs.


```http
GET /api/activity-logs
```

| Parameter | Type | Description |
| :--- | :--- | :--- |
| `ID` | `integer` | **Path param**. Activity Log ID |


### Response

```javascript
{
    "id": 2,
    "log_name": "webhook",
    "description": "webhook received",
    "subject_type": "App\\Models\\Webhooks\\Webhook",
    "event": "PIX_CASH_IN",
    "subject_id": 1,
    "causer_type": "App\\Models\\Webhooks\\Webhook",
    "causer_id": 1,
    "properties": {
        "event": "PIX_CASH_IN",
        "partner": "Empresa X",
        "webhook": {
            "id": 1,
            "url": "http://localhost/webhook/pix_cash_in",
            "type": "PIX_CASH_IN",
            "created_at": "2022-12-07T17:36:07.000000Z",
            "deleted_at": null,
            "updated_at": "2022-12-07T17:36:07.000000Z",
            "description": "PIX_CASH_IN"
        },
        "event_id": "2323232",
        "description": "Pix cash in"
    },
    "batch_uuid": null,
    "created_at": "2022-12-07T17:45:45.000000Z",
    "updated_at": "2022-12-07T17:45:45.000000Z"
}
```

## Status Codes

Gophish returns the following status codes in its API:

| Status Code | Description |
| :--- | :--- |
| 200 | `OK` |
| 201 | `CREATED` |
| 400 | `BAD REQUEST` |
| 404 | `NOT FOUND` |
| 500 | `INTERNAL SERVER ERROR` |

