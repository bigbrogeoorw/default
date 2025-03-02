<?php

/* Local configuration for Roundcube Webmail */

// ----------------------------------
// SQL DATABASE
// ----------------------------------
// Database connection string (DSN) for read+write operations
// Format (compatible with PEAR MDB2): db_provider://user:password@host/database
// Currently supported db_providers: mysql, pgsql, sqlite, mssql, sqlsrv, oracle
// For examples see http://pear.php.net/manual/en/package.database.mdb2.intro-dsn.php
// Note: for SQLite use absolute path (Linux): 'sqlite:////full/path/to/sqlite.db?mode=0646'
//       or (Windows): 'sqlite:///C:/full/path/to/sqlite.db'
// Note: Various drivers support various additional arguments for connection,
//       for Mysql: key, cipher, cert, capath, ca, verify_server_cert,
//       for Postgres: application_name, sslmode, sslcert, sslkey, sslrootcert, sslcrl, sslcompression, service.
//       e.g. 'mysql://roundcube:@localhost/roundcubemail?verify_server_cert=false'
$config['db_dsnw'] = 'mysql://root:@localhost/roundcubemail';

// ----------------------------------
// IMAP
// ----------------------------------
// The IMAP host chosen to perform the log-in.
// Leave blank to show a textbox at login, give a list of hosts
// to display a pulldown menu or set one host as string.
// Enter hostname with prefix ssl:// to use Implicit TLS, or use
// prefix tls:// to use STARTTLS.
// Supported replacement variables:
// %n - hostname ($_SERVER['SERVER_NAME'])
// %t - hostname without the first part
// %d - domain (http hostname $_SERVER['HTTP_HOST'] without the first part)
// %s - domain name after the '@' from e-mail address provided at login screen
// For example %n = mail.domain.tld, %t = domain.tld
// WARNING: After hostname change update of mail_host column in users table is
//          required to match old user data records with the new host.
$config['default_host'] = 'localhost';

// SMTP port. Use 25 for cleartext, 465 for Implicit TLS, or 587 for STARTTLS (default)
$config['smtp_port'] = 25;

// provide an URL where a user can get support for this Roundcube installation
// PLEASE DO NOT LINK TO THE ROUNDCUBE.NET WEBSITE HERE!
$config['support_url'] = '';

// This key is used for encrypting purposes, like storing of imap password
// in the session. For historical reasons it's called DES_key, but it's used
// with any configured cipher_method (see below).
// For the default cipher_method a required key length is 24 characters.
$config['des_key'] = 'S5VDMOZJW2upyiNIfX0DzYSe';

// Automatically add this domain to user names for login
// Only for IMAP servers that require full e-mail addresses for login
// Specify an array with 'host' => 'domain' values to support multiple hosts
// Supported replacement variables:
// %h - user's IMAP hostname
// %n - hostname ($_SERVER['SERVER_NAME'])
// %t - hostname without the first part
// %d - domain (http hostname $_SERVER['HTTP_HOST'] without the first part)
// %z - IMAP domain (IMAP hostname without the first part)
// For example %n = mail.domain.tld, %t = domain.tld
$config['username_domain'] = 'mydomain.dz';

// ----------------------------------
// PLUGINS
// ----------------------------------
// List of active plugins (in plugins/ directory)
$config['plugins'] = [];

$config['plugins'] = array('password', 'enigma');

$config['password_driver'] = 'hmail';
$config['password_db_dsn'] = 'mysql://Administrator:12345@localhost/hmailserverdb';
$config['password_query'] = 'UPDATE hm_accounts SET account_password = %c WHERE accountaddress = %u';
$config['password_algorithm'] = 'sha256';

$config['enigma_pgp_homedir'] = 'D:/pgp';
$config['enigma_pgp_binary'] = 'C:/Program Files (x86)/GnuPG/bin/gpg.exe';
$config['enigma_pgp_agent'] = '';
$config['enigma_debug'] = true;

$config['debug_level'] = 1; // Enable debugging
$config['log_driver'] = 'file'; // Log errors to a file
$config['log_dir'] = 'logs/'; // Log directory

// IMAP
$config['imap_host'] = 'ssl://localhost:993';
//$config['imap_auth_type'] = 'LOGIN';
$config['imap_delimiter'] = '/';
// Required if you're running PHP 5.6 or later
$config['imap_conn_options'] = array(
    'ssl' => array(
        'verify_peer'  => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ),
);

// SMTP
$config['smtp_host'] = 'ssl://localhost:465';
$config['smtp_user'] = '%u';
$config['smtp_pass'] = '%p';
//$config['smtp_auth_type'] = 'LOGIN';
// Required if you're running PHP 5.6 or later
$config['smtp_conn_options'] = array(
    'ssl' => array(
        'verify_peer'      => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ),
);

// This key is used for encrypting purposes, like storing of imap password
// in the session. For historical reasons it's called DES_key, but it's used
// with any configured cipher_method (see below).
// For the default cipher_method a required key length is 24 characters.
$config['des_key'] = 'pQgx6mibDdDdEiygXmyNQFsP';

// Encryption algorithm. You can use any method supported by OpenSSL.
// Default is set for backward compatibility to DES-EDE3-CBC,
// but you can choose e.g. AES-256-CBC which we consider a better choice.
$config['cipher_method'] = 'AES-256-CBC';

$config['create_default_folders'] = true;
$config['default_folders'] = array('INBOX', 'Sent', 'Drafts', 'Trash', 'Junk');

$config['trash_mbox'] = 'Trash'; // Name of the Trash folder
$config['skip_deleted'] = True; // Move emails to Trash instead of marking them as deleted
$config['flag_for_deletion'] = true; // Flag emails for deletion when moved to Trash