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

Login to the backend twice. If error continues, try one of the following:

- Use bundled salt generator: `php src/generate-keys.php` and add them to `config/keys.php` or `config/config.php`.
- Create `COOKIE_SALT` manually by picking random characters and symbols of at least 10 characters and set in `config/keys.php` or `config/config.php`.
