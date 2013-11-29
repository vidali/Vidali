#!/bin/bash

#Compress javascript files

#Compress css files
lessc css/style.less css/style.css
#Generate documentation
jsdoc js/models/*.js js/templates/*js js/views/*js js/vidali.js -d Doc/
