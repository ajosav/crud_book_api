# CRUD BOOK API

CRUD book API is a task assigned to me by AFTJDIGITAL as a second level of the screening process. The API has the following features

- Register a user
- Login a user
- A user can add a book to a database
- Get all books from a database
- Get a single book from a database
- Delete a book from a database

### API Endpoints

- Register a user
> `POST` <https://{domain}/api/v1/users/create>
##### Payload
		{
			"first_name" : "micheal",
			"last_name" : "smith",
			"email" : "example@example.com",
			"password_confirmation" : "secret@_Password",
			"password" : "secret@_Password"
		}
##### Response
		{
			  "status": "success",
			  "message": "User Account Successfully created",
			  "data": {
				"first_name": "micheal",
				"last_name": "smith",
				"email": "example@example.com",
				"_token": "1|5bfPsdWcztwVSOksyyKcyklaCobhiezUHecU5X0K"
		  	}
		}
----
- Login a user
> `POST` <https://{domain}/api/v1/users/login>
##### Payload
    {
        "email" : "example@example.com",
        "password" : "secret@_Password",
    }
##### Response
    {
          "status": "success",
          "message": "User Successfully Authenticated",
          "data": {
            "first_name": "michael",
            "last_name": "smith",
            "email": "example@example.com",
            "_token": "1|5bfPsdWcztwVSOksyyKcyklaCobhiezUHecU5X0K"
          }
    }
----
- Create a book
> `POST` <https://{domain}/api/v1/books>
###### `Headers: Bearer 1|5bfPsdWcztwVSOksyyKcyklaCobhiezUHecU5X0K`
##### Payload
    {
        "title" : "The Key to Success",
        "author" : "Bola Akintomide",
        "description" : "An inspirational book ..."
    }
##### Response
    {
          "status": "success",
          "message": "Book creation was successful",
          "data": {
            "id": "4dd9555fbeffd727805d77a9b33c14d2",
            "title": "The Key to Success",
            "author": "Bola Akintomide",
            "description": "An inspirational book ...",
            "creation_date": "2021-02-06 23:05:21",
            "created_by": "example@example.com"
          }
    }
----
- Retrieve all books
> `GET` <https://{domain}/api/v1/books>
###### `Headers: Bearer 1|5bfPsdWcztwVSOksyyKcyklaCobhiezUHecU5X0K`
###### Optional Filters
        ?created_by=example@example.com
        &order=asc
        &title=Give%20me%20
        &created_at=2021-02-06`
##### Response
    {
          "status": "success",
          "message": "Books retrieved successfully",
          "data": [
            {
              "id": "ba080edcd4d7287c91506fe303b119ca",
              "title": "The Key to Success",
              "author": "Bola Akintomide",
              "description": "An inspirational book ...",
              "creation_date": "2021-02-06 23:05:06",
              "created_by": "example@example.com"
            },
            {
              "id": "4dd9555fbeffd727805d77a9b33c14d2",
              "title": "Give me the key",
              "author": "Roland Great",
              "description": "",
              "creation_date": "2021-02-06 23:05:21",
              "created_by": "mailuser@example.com"
            }
          ]
    }
----
- Find a book
> `GET` <https://{domain}/api/v1/books/{id}>
###### `Headers: Bearer 1|5bfPsdWcztwVSOksyyKcyklaCobhiezUHecU5X0K`
##### Response
    {
          "status": "success",
          "message": "Found a book with your id",
          "data": {
            "id": "ba080edcd4d7287c91506fe303b119ca",
            "title": "The Key to Success",
            "author": "Bola Akintomide",
            "description": "An inspirational book ...",
            "creation_date": "2021-02-06 23:05:06",
            "created_by": "example@example.com"
          }
    }
----
- Delete a book
> `DELETE` <https://{domain}/api/v1/books/{id}>
###### `Headers: Bearer 1|5bfPsdWcztwVSOksyyKcyklaCobhiezUHecU5X0K`
##### Response
    {
      "status": "success",
      "message": "Book deleted successfully",
      "data": {}
    }
----
- Update a book
> `PATCH` <https://{domain}/api/v1/books/{id}>
###### `Headers: Bearer 1|5bfPsdWcztwVSOksyyKcyklaCobhiezUHecU5X0K`
##### Payload
    {
        "title" : "The Key to Greatness",
        "author" : "Bola Akintomide",
        "description" : "An inspirational book ..."
    }
##### Response
    {
          "status": "success",
          "message": "Book update was successful",
          "data": {
                "id": "ba080edcd4d7287c91506fe303b119ca",
                "title": "The Key to Greatness",
                "author": "Bola Akintomide",
                "description": "An inspirational book ...",
                "creation_date": "2021-02-06 23:05:06",
                "created_by": "example@example.com"
          }
    }
----
