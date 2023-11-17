# Onion-Media

Docker image for creating a media sharing website through the onion network.

This repository was created based on the onion Share project.

The project's operation is based on a Docker image containing all the configuration necessary to set up a website specialized in delivering media to the user, with just a few simple configurations required in the image for everything to work.

## Configuring image files

Replace the files in the folder with your onion server keys:
`source/configs/onion/keys/`

Add your site's hostname to the file:
`source/configs/onion/hostname`

Add your public SSH key to the file:
`source/configs/ssh/authorized_keys`

## Creating the container

To create the Docker image, run:
`docker build -t onion-media .`

To start a container with the created image, run:
`docker run -it --rm -p 22:22 -p 80:80 --name onion-media onion-media`

**Warning: Before creating the image, be sure to correctly configure the image files!**

## Accessing your website

After the entire process, you can access your website locally at:
`http://localhost:80`

You can also remember your website's onion URL through the following link:
`http://localhost:80/hostname.tor`

And with your onion URL in hand, you can access your website, or use a TOR proxy to access your container via SSH.

## Limitations of SSH

For security reasons, the onion network and the operation of Docker, there are certain limitations related to SSH, including:

- Access to the server is via trusted public keys configured in the `source/configs/ssh/authorized_keys` file, and there is no possibility of connecting via passwords.

- SSH has a limit number of simultaneous connections, you can change this and other server settings in the `source/configs/ssh/sshd_config` file.

- As the connection is made via the TOR network, the connection tends to be slow.

- If you change the container used to host your website, when you try to connect via SSH again, your SSH client will recognize that it hears some change on the server when connecting, you can bypass the strict checking of the server keys and connect to the server , or delete the known keys from your SSH client:

    - Recommended option: To bypass strict key checking, run:
    `ssh -o StrictHostKeyChecking=no username@hostname`

    - To erase your SSH client's known keys, run:
    `rm ~/.ssh/known_hosts.old ~/.ssh/known_hosts`
