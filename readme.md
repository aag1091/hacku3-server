## API Urls and Required Parameters

The following URLs can be used by 3rd party apps to access the data.

**/api/events/list**
* Request Method: GET 
* Parameters:
    * user_id:
        * Data Type: Integer
        * Required: Yes
    * cat:
        * Data Type: Integer
        * Required: No
        * Purpose: Filter events based on their category ID. The IDs are the following.
        1 - Sports
        2 - Entertainment
        3 - Other
        4 - Greek
        5 - School 
    * limit:
        * Data Type: Integer
        * Required: No
        * Purpose: Limit the number of entries returned.
* Returns: Success status; A JSON array of events in the database.

**/api/events/add**
* Request Method: POST
* Parameters:
    * user_id:
        * Data Type: Integer
        * Required: Yes
    * title:
        * Data Type: String
        * Required: Yes
    * description:
        * Data Type: String
        * Required: Yes
    * location:
        * Data Type: String
        * Required: Yes
    * category_id:
        * Data Type: Integer
        * Required: Yes
    * time:
        * Data Type: DateTime in format year-month-day hour:minute:second
        * Required: Yes
    * attendee_limit:
        * Data Type: Integer
        * Required: Yes
        * Extra Note: When set to 0, it means there is no limit on attendees.
* Returns: Success status

**/api/events/remove/{id}**
* Request Method: DELETE
* Parameters:
    * user_id:
        * Data Type: Integer
        * Required: Yes
* Returns: Success status

**/api/events/join/{id}**
* Request Method: POST
* Parameters:
    * user_id:
        * Data Type: Integer
        * Required: Yes
* Returns: Success status

**/api/events/unjoin/{id}**
* Request Method: POST
* Parameters:
    * user_id:
        * Data Type: Integer
        * Required: Yes
* Returns: Success status

**/api/events/{id}/attendee/{attendee_user_id}/verify
* Request Method: POST
* Parameters:
    * user_id:
        * Data Type: Integer
        * Required: Yes
* Returns: Success status

**/api/events/{id}/attendee/{attendee_user_id}/unverify
* Request Method: POST
* Parameters:
    * user_id:
        * Data Type: Integer
        * Required: Yes
* Returns: Success status
    
**/api/user/events**
* Request Method: GET
* Parameters:
    * user_id:
        * Data Type: Integer
        * Required: Yes
* Returns: Success status

**/api/event/{id}/attendees**
* Request Method: GET
* Parameters:
    * id:
        * Data Type: Integer
        * Required: Yes
    * user_id:
        * Data Type: Integer
        * Required: Yes
* Returns: Success status
