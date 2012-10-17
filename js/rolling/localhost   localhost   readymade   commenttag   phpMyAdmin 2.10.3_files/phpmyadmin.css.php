html {
    font-size: 100%;
}

input, select, textarea {
    font-size: 1em;
}

/* @deprecated */
.nowrap {
    white-space: nowrap;
}
div.nowrap {
    margin: 0;
    padding: 0;
}

/******************************************************************************/
/* general tags */

body {
    font-family:        Arial;
	font-size:        15px;
    background:         #D0DCE0;
    color:              #333399;
    margin:             0;
    padding:            0.2em 0.2em 0.2em 0.2em;
}

a img {
    border: 0;
}

form {
    margin:             0;
    padding:            0;
    display:            inline;
}

select {
	font-size:        13px;
    width:              100%;
}

/* buttons in some browsers (eg. Konqueror) are block elements,
   this breaks design */
button {
    display:            inline;
}


/******************************************************************************/
/* classes */

/* leave some space between icons and text */
.icon {
    vertical-align:     middle;
    margin-right:       0.3em;
    margin-left:        0.3em;
}


/******************************************************************************/
/* specific elements */

div#pmalogo,
div#leftframelinks,
div#databaseList {
    text-align:         center;
    border-bottom:      0.05em solid #333399;
    margin-bottom:      0.5em;
    padding-bottom:     0.5em;
}

div#leftframelinks .icon {
    padding:            0;
    margin:             0;
}

div#leftframelinks a img.icon {
    margin:             0;
    padding:            0.2em;
    border:             0.05em solid #333399;
}

div#leftframelinks a:hover {
    background:         #9999CC;
    color:              #000000;
}

/* serverlist */
#body_leftFrame #list_server {
    list-style-image: url(.././themes/original/img/s_host.png);
    list-style-position: inside;
    list-style-type: none;
    margin: 0;
    padding: 0;
}

#body_leftFrame #list_server li {
    margin: 0;
    padding: 0;
    font-size:          80%;
}

/* leftdatabaselist */
div#left_tableList ul {
    list-style-type:    none;
    list-style-position: outside;
    margin:             0;
    padding:            0;
    font-size:          80%;
    background:         #D0DCE0;
}

div#left_tableList ul ul {
    font-size:          100%;
}

div#left_tableList a {
    background:         #D0DCE0;
    color:              #333399;
    text-decoration:    none;
}

div#left_tableList a:hover {
    background:         #D0DCE0;
    color:              #333399;
    text-decoration:    underline;
}

div#left_tableList li {
    margin:             0;
    padding:            0;
    white-space:        nowrap;
}

/* marked items */
div#left_tableList > ul li.marked > a,
div#left_tableList > ul li.marked {
    background: #FFCC99;
    color: #000000;
}

div#left_tableList > ul li:hover > a,
div#left_tableList > ul li:hover {
    background:         #9999CC;
    color:              #000000;
}

div#left_tableList img {
    padding:            0;
    vertical-align:     middle;
}

div#left_tableList ul ul {
    margin-left:        0;
    padding-left:       0.1em;
    border-left:        0.1em solid #333399;
    padding-bottom:     0.1em;
    border-bottom:      0.1em solid #333399;
}
