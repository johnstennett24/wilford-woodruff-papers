# API Documentation
### Here you will find all you will need to access the data of the Wilford Woodruff Papers to help others get a glimpse into the life of Wilford Woodruff in your projects!

## /documents
    Returns: 
        - ID
        - UUID
        - Name
        - Relationships
        - People
        - Places
        - Topics
        - Dates
        - First Image
        - Links
            - Frontend
            - API url

Example:
    
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/documents"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```
Filters:

Filter by name of document
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/documents?name=page_001"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```
Filter with array of types
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/documents?types=[journal]"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```
Filter by date
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/documents?date=1838-07-08"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```

Filter by date range

Example:

```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/documents?date_start=1838-07-08&date_end=1839-04-25"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```

## /pages
    Returns:
        - ID
        - UUID
        - Name
        - Parent ID
        - Parent Name
        - Full Transcript
        - Text Transcript
        - Image URL
        - Relationships
        - Dates
        - People
        - Places
        - Topics
        - Links
        - Frontend
        - API

Example:

```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/pages"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```
Filters:

Filter by name
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/pages?name=page_001"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```

Filter by types array
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/pages?types=[journal]"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```
Filter by date
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/pages?date=1838-07-08"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```

Filter by date range
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/pages?date_start=1838-07-08&date_end=1839-04-25"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```

## /people
    Returns:
        - ID
        - Slug
        - Name
        - Links
        - Frontend
        - API
        - Should be able to search by name
        - Filters
        - Should be able to search by name

Example:

```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/people"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```
## /places
    Returns
        - ID
        - Slug
        - Name
        - Links
        - Frontend
        - API

Example:

```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/places"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```
Filters:

Filter by name:
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/places?name=American House,St.Louis,St.LouisCounty,Missouri"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```
## /topics
    Returns:
        - ID
        - Slug
        - Name
        - Links
        - Frontend
        - API
        - Filters
Example:
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/topics"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```

Filters:

Filter by name:
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/topics?name=angels"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```

## /children
    Returns:
        - Name
        - Gender
        - Birthdate
        - Birthplace

Example:
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/children"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```
## /wives
    Returns:
        - Name
        - Marriage Year
        - Mother
        - Father
        - Children
        - Links
```javascript

let url = "https://wilfordwoodruffpapers.org/api/v1/wives"

async function getDocuments(url) {
    const response = await fetch(url)
    var data = await response.json()
}
```
