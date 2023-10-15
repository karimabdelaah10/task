# Interview Task


## To Run the project
- run the following commands
```bash
./scripts/create_env_file.sh
```
- edit the `.env` file and set your environment variables (optional)
- run the app
```bash
docker network create "task-network"
```
```bash
docker-compose up --build -d
```
- run bash in the app container
```bash
docker exec -it task-app bash
```
- in the container bash run the following commands
```bash
/bin/prepare_env.sh
```
 - edit the `core/.env` file and set you environment variables (optional)
- access your application from browser using [this link](http://127.0.0.1:3515)
## To Access Users List Api 
```bash
curl --location 'http://127.0.0.1:3515/api/v1/users'
```
    - provider: DataProviderX or DataProviderY
    - statusCode: authorised or declined or refunded
    - currency: EUR or USD or AED
    - balanceMin: 10
    - balanceMax: 100
```bash
curl --location 'http://127.0.0.1:3515/api/v1/users?provider=DataProviderX&statusCode=authorised&currency=USD&balanceMin=10&balanceMax=100'
``` 
**Note:** 
    
- you can use any combination of the parameters above
- you can use returnTransformer=true to return the data with the transformer
```bash
curl --location 'http://127.0.0.1:3515/api/v1/users?returnTransformer=true&provider=DataProviderX&statusCode=authorised&currency=USD&balanceMin=10&balanceMax=100'
```
## To Sync Data From Provider 
- run bash in the app container
```bash
docker exec -it task-app bash
```
- in the container bash run the following commands
```bash
php artisan db:seed
```

## To Add Extra Data Provider
- add the new data provider to `core/database/seeders/data/` 
```bash
make sure that the new data provider file name something with this pattern "prefix".json
```
- add new "Handler Class" in "core/app/Modules/Transaction/Handler/" and this handlerClass must implement "ProviderHandlerInterface"
- go to "FactoryEnum" file here "core/app/Modules/Transaction/Enum/FactoryEnum.php"
```bash
make sure that you added new provider "prefix" as a new cont value 
```
```bash
make sure that you added new provider "prefix" in "getProvidersPrefixes" function 
```

```bash
make sure that you added new provider "prefix" => "Handler Class" in "getProviderHandlerClass" function 
```
---------------------------------
## To Meet Your Evaluation Criteria I Focussed On Some Points 
 ##### Let Me Highlight this points
### - Code Quality
    to write this task with high quality i used 
    - HMVC Design Pattern       Ex: core/app/Modules Folder
    - Repo Design Pattern       Ex: core/app/Modules/User/Repositories/UserRepository.php File
    - Factory Design Pattern    Ex: core/app/Modules/Transaction/Enum/FactoryEnum.php File
                                Ex: core/app/Modules/Transaction/UseCase/TransactionUseCase.php:20
### - Application Performance In Reading Large Files
     1- to take care of this point i used Job To Sync Data 
     2- to avoide any issue may occured in parsing files i used try and catch here core/app/Modules/Transaction/UseCase/TransactionUseCase.php:14
        and ignored this file where there is an issue in parsing this file data( in real life case i used to log the issue and 
        handel it )

### - Code Scalability : ability to add DataProviderZ 
    to make it easy to add new Data Provider i used 
    Factory Design Pattern as mentioned before with examples
and in this README File I Explained [HOW TO ADD NEW DATA PROVIDER](#to-add-extra-data-provider) 
### - Unit Tests Coverage
    I impelemented a test cases on the api list users with many cases which you asked about on task description
### - Docker
    I implelemented a docker images to run this app 
    Docker Services I Used
    1-PHP
    2-NGINX
    3-MYSQL
and in this README File I Explained [HOW TO ADD RUN THE PROJECT](#to-run-the-project) 
