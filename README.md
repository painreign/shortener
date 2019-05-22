# Docker
1. docker-compose down -v
2. docker-compose up -d

# How to use
1. Go to: http://127.0.0.1:8095/

# Scale
1. Sharding
2. Caching
3. Orchestration
4. Load balancing

# Sharding
I would use horizontal sharding and split up url_list table into 1000 mysql servers. 
I would classified them by first 5 digits of shortened url. 
I would not use replication as it is better to create separate shard,
which improves write performance also.

After this manipulations we have 10 mln records on each mysql server.
We will also have 10 000 reads per second from each server and 10 writes

In order to achieve this we will have to create shard manager service, 
which will return pdo connection based on short url. And this connection will be used
by UrlList same way as it is used now.

After thinking about it a little bit more, I think mysql was not the best choice for this task,
since MongoDb supports sharding out of the box. And is perfect when there is low amount of relations
like in our case.

So in order to replace MySQL with MongoDB we will have to add another component MongoModel
which is extended by our model UrlList and we will have to replace create and select methods in UrlList

Hopefully we have realised this before we launched our project, then we don't have to deal
with transferring data.

# Caching
Since we sill have high volume of reads, we need to cache it, I would use redis here, 
though memcached is a bit faster for reads, redis supports replication. 
And persistence if needed. So in case of failure of one of the nodes redis will not loose
all caching data. 

In order to add caching we modify UrlManagerService 
and before querying database we check if data are available in redis

# Orchestration
In order to keep this system stable we need orchestration like Kubernetes which,
will scale and manage our containers.

# Load balancing
In order to route traffic to our services we will need LoadBalancer. We can use
Google LoadBalancer or nginx ingress

# How this works all together
We deploy multiple copies of our application using Kubernetes
Then in front of it we have LoadBalancer which divides traffic between application copies.
Each application then uses cache to get long url by short. If it is not in cache,
then we query database and add value to cache.