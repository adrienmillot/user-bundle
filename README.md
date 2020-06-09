# Create your User class

To use this bundle, you have to create your own User class which extends to AbstractUser class.

```php
// src\Entity\User.php

<?php

declare(strict_types=1);

namespace App\Entity;

use amillot\UserBundle\Entity\AbstractUser;

class User extends AbstractUser
{
}

```

# Encoding Passwords

You can control how your user password is encoded in security.yaml.

```yaml
// config/packages/security.yaml
security:
    encoders:
        App\Entity\User: bcrypt

```

# Authentication & firewalls

A firewall is the process which allow to authenticate your system.

Only one firewall is used by request. You can use [pattern, host or service](https://symfony.com/doc/current/security/firewall_restriction.html) to identify the firewall to use.

All real URLs are handled by the main firewall (no pattern key means it matches all URLs). A firewall can have many modes of authentication, in other words many ways to ask the question "Who are you?". Often, the user is unknown (i.e. not logged in) when they first visit your website. The anonymous mode, if enabled, is used for these requests.

```yaml
// config/packages/security.yaml
security:
    // ...

    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false

        main:
            provider: users
            anonymous: lazy
            form_login:
                login_path: home
                check_path: login
                use_referer: true
                default_target_path: dashboard
            logout:
                path: logout

    // ...
```

# Denying access, Roles, and other Authorization

```yaml
// config/packages/security.yaml
security:
    // ...

    # Easy way to control access for large sections of your site
    # Note: Only the *first* access control that matches will be used
    access_control:
        - { path: '^/login', roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: '^/register', roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: '^/$', roles: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: '^/', roles: ROLE_USER }

```

# Link Profile entity to User entity

You have to specify the User class to use instead of UserInterface.

```yaml
// config/packages/doctrine.yaml
doctrine:

    // ...

    orm:

        // ...

        resolve_target_entities:
            amillot\UserBundle\Model\UserInterface: App\Entity\User
```

# Add Mapping information

## User mapping

```xml
<!-- config/doctrine/ORM/Profile.orm.xml -->
<doctrine-mapping xmlns="http://doctrine-project.org/schemas/orm/doctrine-mapping"
                  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                  xsi:schemaLocation="http://doctrine-project.org/schemas/orm/doctrine-mapping
                          https://www.doctrine-project.org/schemas/orm/doctrine-mapping.xsd">

    <entity name="App\Entity\User" table="users">
    </entity>

</doctrine-mapping>
```
