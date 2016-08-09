<?php
add_action('admin_head', 'wd_custom_options_admin_css');

function wd_custom_options_admin_css() {
  echo '<style>
h2.custom-options-page-header {
     font-size: 24px;
     text-transform: uppercase;
     font-weight: 900;
     text-shadow: 0 1px 0 #fff;
     margin: 25px 0 15px 0;
}
.post-admin-input-row {
     padding-bottom: 15px;
}
.post-admin-input-row.last {
     padding-bottom: none;
}
.post-admin-input-row label {
     width: 100%;
     display: block;
     margin-bottom: 5px;
}
.post-admin-input-row input[type=color],
.post-admin-input-row input[type=date],
.post-admin-input-row input[type=datetime-local],
.post-admin-input-row input[type=datetime],
.post-admin-input-row input[type=email],
.post-admin-input-row input[type=month],
.post-admin-input-row input[type=number],
.post-admin-input-row input[type=password],
.post-admin-input-row input[type=radio],
.post-admin-input-row input[type=search],
.post-admin-input-row input[type=tel],
.post-admin-input-row input[type=text],
.post-admin-input-row input[type=time],
.post-admin-input-row input[type=url],
.post-admin-input-row input[type=week],
.post-admin-input-row select,
.post-admin-input-row textarea {
     width: 100%;
     box-shadow: none;
     padding: 7px;
     border-radius: 3px;
}
.admin-content-container {
     float: left;
     background-color: white;
     width: 98%;
     padding: 20px;
     box-sizing: border-box;
     -moz-box-sizing: border-box;
     -webkit-box-sizing: border-box;
     border: 1px solid #ccc;
     border-radius: 3px;
}
.admin-input-row {
     float: left;
     width: 100%;
     margin-bottom: 10px;
}
.admin-input-row.half-width {
	width: 50%;
}
.admin-input-row label {
     float: left;
     width: 100%;
     font-size: 14px;
     line-height: 30px;
     margin-right: 10px;
     font-weight: 600;
     text-transform: uppercase;
     color: #000;
}
.admin-input-row label span {
     margin-left: 5px;
     font-weight: 400;
     text-transform: none;
}
.admin-input-row input {
     float: left;
     margin: 0;
     padding: 0 10px;
     line-height: 30px;
     height: 30px;
     width: 450px;
     box-shadow: none;
     border: 1px solid #ccc;
     border-radius: 3px;
}
.admin-input-row.half-width input,
.admin-input-row.half-width textarea {
     width: 80%;
}
.admin-input-row input[type="checkbox"] {
     height: 18px;
     width: 18px;
     margin: 5px 7px 0 0;
}
.admin-input-row textarea {
     float: left;
     width: 450px;
     height: 100px;
     clear: both;
     box-shadow: none;
     border: 1px solid #ccc;
     border-radius: 3px;
}
.wp-core-ui .button.mw-upload-image,
.reset-button {
     margin: 5px 5px 0 1px;
     line-height: 30px;
     padding: 0 10px;
     width: 100px;
     text-align: center;
     height: 30px;
}
.reset-button {
     color: #555;
     border-color: #ccc;
     background: #f7f7f7;
     box-shadow: inset 0 1px 0 #fff,0 1px 0 rgba(0,0,0,.08);
     vertical-align: top;
     display: inline-block;
     text-decoration: none;
     font-size: 13px;
     cursor: pointer;
     border-width: 1px;
     border-style: solid;
     -webkit-appearance: none;
     border-radius: 3px;
     white-space: nowrap;
     -moz-box-sizing: border-box;
     box-sizing: border-box;
     margin-left: 0;
}
.wp-core-ui .button.mw-upload-image:hover,
.reset-button:hover {
     background-color: #0074a2;
     border: 1px solid #777;
     color: white;
     -webkit-box-shadow: none;
}
.image-buttons {
     float: left;
     width: 100%;
     margin-top: 10px;
}
.image-preview {
     float: left;
     width: 100%;
     margin-top: 10px;
     font-style: italic;
}
.image-preview a {
     text-decoration: none;
     font-weight: 600;
}
.image-preview a:hover {
     text-decoration: underline;
}
.admin-slide-wrapper {
     float: left;
     padding: 10px 10px 0 10px;
     margin: 0 0 10px 0;
     border: 1px solid #ccc;
     position: relative;
     width: 100%;
     box-sizing: border-box;
     -moz-box-sizing: border-box;
     -webkit-box-sizing: border-box;
     border-radius: 3px;
     overflow: hidden;
}
.admin-description-content {
     float: left;
     width: 100%;
     margin-bottom: 15px;
     font-size: 14px;
     line-height: 22px;
     border-bottom: 1px solid #ccc;
     padding-bottom: 10px;
     text-align: center;
}
.admin-slide-header {
     float: left;
     position: relative;
     width: 100%;
     padding: 0 10px;
     margin: -10px 0 0 -10px;
     line-height: 40px;
     font-size: 18px;
     text-transform: uppercase;
     background-color: #F7D6D6;
     font-weight: 700;
     text-shadow: 0 1px 0 #fff;
}
.admin-slide-wrapper.open .admin-slide-header {
     background-color: #d6ebcd;
}
.admin-slide-wrapper i {
     position: absolute;
     right: 10px;
     top: 5px;
     font-size: 30px;
     color: #550d0d;
     cursor: pointer;
}
i.red-arrow {
     color: #550d0d;
}
.admin-slide-wrapper i:hover {
     color: #bd1e1e;
}
.admin-slide-wrapper i.fa-rotate-180,
i.green-arrow {
     color: #354930;
}
.admin-slide-wrapper i.fa-rotate-180:hover {
     color: #597a51;
}
.admin-slide-wrapper .admin-slide-header i {
     position: relative;
     right: auto;
     top: 3px;
     color: #555;
     border-right: 1px solid rgba(0,0,0,0.2);
     padding-right: 8px;
     margin-right: 3px;
}
.admin-slide-wrapper .admin-slide-header i.hidden {
     display: none;
}
.admin-slide-header.bottom-border {
     border-bottom: 1px solid #eee;
}
.admin-slide-inner {
     display: none;
     float: left;
     width: 100%;
     padding: 10px 10px 0 10px;
     background-color: whitesmoke;
     margin-left: -10px;
}
.section-break {
     float: left;
     width: 100%;
     height: 1px;
     border-top: 1px dotted #ccc;
     margin: 15px 0;
}
.slideshow-submit {
     float: left;
     width: 100%;
}
.options-submit p.submit {
     float: left;
     margin: 10px 0 0 0;
     padding: 0;
}
#adminmenu #toplevel_page_wd-custom-options-includes-wd-options-menu.menu-icon-generic div.wp-menu-image:before {
     content: "\f119";
}
#menu-posts-management .dashicons-admin-post:before, 
#menu-posts-management .dashicons-format-standard:before {
     content: "\f338";
}
#menu-posts-wd_sponsors .dashicons-admin-post:before,
#menu-posts-wd_sponsors .dashicons-format-standard:before {
     content: "\f154";
}
#menu-posts-speakers .dashicons-admin-post:before,
#menu-posts-speakers .dashicons-format-standard:before {
     content: "\f521";
}

  </style>';
}
?>
