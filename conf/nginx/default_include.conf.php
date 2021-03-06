location / {
    index  index.php index.html index.htm;
}

# for people with app root as doc root, restrict access to a few things
location ~ ^/(composer\.|Procfile$|<?=getenv('COMPOSER_VENDOR_DIR')?>/|<?=getenv('COMPOSER_BIN_DIR')?>/) {
    deny all;
}

error_page 404 /notfound.php;

rewrite ^/news/page/(d+)/?$ /index.php?p=news&page=$1 last;
rewrite ^/forums/add/?$ /index.php?p=forums&action=add last;
rewrite ^/forums/edit/?$ /index.php?p=forums&action=edit last;
rewrite ^/forums/category/([^/.]+)/?$ /index.php?p=forums&cat=$1 last;
rewrite ^/forums/edit/([^/.]+)/?$ /index.php?p=forums&action=edit&tid=$1 last;
rewrite ^/forums/edit/([^/.]+)/([^/.]+)/?$ /index.php?p=forums&action=edit&tid=$1&pid=$2 last;
rewrite ^/search/([^/.]+)/?$ /index.php?p=search&term=$1 last;
rewrite ^/maps/([^/.]+)/?$ /index.php?p=maps#$1 last;
rewrite ^/([^/.]+)/?$ /index.php?p=$1 last;
rewrite ^/([^/.]+)/([^/.]+)/?$ /index.php?p=$1&id=$2 last;
