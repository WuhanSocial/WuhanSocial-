<?php
/**
 * 
 * Security check. No one can access without Wordpress itself
 * 
 * */
defined('ABSPATH') or die();

?>

<?php if(!defined('FILE_MANAGER_PREMIUM')): ?>
	<div class='sidebar-highlight'>
		Features
	</div>
	<ul>
		<li class='badge-free' data-badge='free'>Upload, Download, Delete</li>
		<li class='badge-free' data-badge='free'>Copy, Move, Create, Rename, Archive, Extract, Edit</li>
		<li class='badge-free' data-badge='free'>Supports all mime types</li>
		<li class='badge-pro' data-badge='pro'>Frontend Support</li>
		<li class='badge-pro' data-badge='pro'>File Sharing</li>
		<li class='badge-pro' data-badge='pro'>File Type Control</li>
		<li class='badge-pro' data-badge='pro'>User Permissions</li>
		<li class='badge-pro' data-badge='pro'>UserRole Permissions</li>
		<li class='badge-pro' data-badge='pro'>Bann User/UserRole</li>
<!--
		<li class='badge-pro' data-badge='pro'>FTP</li>
		<li class='badge-pro' data-badge='pro'>Google Drive</li>
		<li class='badge-pro' data-badge='pro'>Dropbox</li>
		<li class='badge-pro' data-badge='pro'>18 Language Support</li>
		<li class='badge-pro' data-badge='pro'>Multiple Themes</li>
-->
	</ul>
<?php endif; ?>
