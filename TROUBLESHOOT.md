# Troubleshooting

## Trailing whitespace error

Error: 

```
security-update.diff:197: trailing whitespace.
security-update.diff:225: trailing whitespace.
security-update.diff:270: trailing whitespace.
security-update.diff:284: trailing whitespace.
```

Resolution:

```
git apply --whitespace=fix security-update.diff
```

## Version information not found in database

Error:

```
module (core) version information not found in database
```

Resolution:

```
Ignore
```

This error only happens because we created a new version update that the LS update process does not know about. The new version was necsesary to generate a system updates. Since LS is no longer maintained, there should no longer be any new system updates.

## Missing configuration value

Error:

```
Missing configuration value (COOKIE_SALT)
```

Resolution:

```
Login to the backend twice.
If error continues, create COOKIE_SALT manually (at least 10 characters) and set in config/keys.php.
```

The error happens when the update process was unable to generate a cryptogragraphically secure `COOKIE_SALT` on your server. The solution is to manually create a `COOKIE_SALT` in `config/keys.php` of at least 10 characters.
