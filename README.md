# crm-laravel-vue
CRM system for manage projects requests on Laravel &amp; Vue.js

Goals:
1. User Registration
2. User Roles and Permissions
3. User with role Manager can add to the system new Project Request.
4. Manage Project Requests
5. User with role Developer can Estimate Project Request.
6. User with role Manager can change Project Request status to Project.
7. User with Role Developer with lowest estimate will be notified about Project. And Developer can confirm or reject Project.
8. If Project was reject, then Developer with higher estimate will be notified about Project.

## Installation
1. Run script to configure Linux environment `wget -O - https://raw.githubusercontent.com/andrew-svirin/docker-environment-bash/master/setup.sh | bash`
2. Clone project `git clone git@github.com:andrew-svirin/crm-laravel-vue.git`
3. Run docker from the folder `docker`:
```bash
cd docker
# Use development environment.
ln -s .env.development .env
# Config docker compose
docker-compose config
# To build docker once.
docker-compose build
# To run docker every launch.
docker-compose up
```
4. Add domains to /etc/hosts
```bash
127.0.0.1       crm.loc
```
5. Check setup:
 - http://crm.loc
 - ssh://crm.loc -- SSH access to php container, credentials - root:root, port - 52022