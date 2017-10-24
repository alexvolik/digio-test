Symfony coding exercise 1 
=======

# Overview

A simple Symfony project to show off your skills.
The application provides a REST interface to fetch entities.
Therer are 2 types of entities: articles and comments. Each comment belongs to an article. There can be multiple comments for the same article.

4 basic routes exist:

- `/api/article`
- `/api/article/{id}`
- `/api/comment`
- `/api/comment/{id}`

# System

Tested system requirements:

- Php 7.1.7
- MySql 5.7.20
- Composer 1.5.2

# Installation:

1. Clone the git repository
2. Create parameters.yml in `app/config/` (template `parameters.yml.dist`)
3. Install dependencies with composer
4. Create database with symfony console found in `bin/`
5. Configure webserver to server the `web` directory
6. Populate database with data. Some sample data can be found in `app/Resources/data/symfony.sql`.

# Your tasks 

- Remove the unwanted attributes (like `__initializer__`, `__cloner__` and `__isInitialized__`) which are present in the json for some entities. IMPORTANT: do not disable lazy loading!
- Change the routing config so that only GET requests are allowed to all routes.
- For the routes where entities are requested by id, handle not found entities so that the error message is also returned in JSON format.
- Extend the application so that for every article also the corresponding comments are returned.
- Add a new route which fetches all comments of a specified article.
- Allow all routes to be paginated with url parameters, e.g. `?page=1&per_page=5`. The solution should be easely extendable to new entites. Also should the needed changes be minimal if one would switch to a different data source (different db provider, external service or file storage etc.). By default return all entities. When provided at least one of the parameters (page or per_page) pagination should be applied. Choose reasonable defaults for both parameters. When given impossible values (like page=-1) implement a fallback (e.g. page = 1). 
- Provide the whole api also in XML format. Let the requester specify the desired format (XML or JSON) in the request header.
- Refactor the code where you find it appropriate




