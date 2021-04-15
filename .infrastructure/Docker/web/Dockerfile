FROM nginx:1.19.6-alpine


WORKDIR /var/www/my-cv
COPY .infrastructure/Docker/web/etc/nginx/conf.d/ /etc/nginx/conf.d/

COPY . /var/www/my-cv

CMD ["nginx", "-g", "daemon off;"]
