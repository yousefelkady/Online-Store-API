# Online-Store-API 
# (look for more details in the Wiki Section of the Repo)

The project will be an online store platform. This platform will help customers to buy or explore products and small stores (businesses) to market for their products and get more customers. 
This platform is much like Amazon store but here our platform will focus on both online and onsite stores and both small business and big businesses.
In this project we will focus on building a reliable API for our store


## MVC Model 
The code is constructed with MVC in mind 

- Controller classes as controllers (Controller Package)
- Service Classes as View (Service Packages)
- DAO Class as Model

## API workflow
- The User accesses one of the 3 introduced web services.
- The user is either sigining up as new or loggin in as existing user
- The user can be either admin, store owner or a client
- "List" service lists all available users in the database 
- The "List" Service is only available for access to the user type "admin"
 
