# Onion-Media

Docker image for creating a media sharing website through the onion network.

This repository was created based on the onion Share project.

The project's operation is based on a Docker image containing all the configuration necessary to set up a website specialized in delivering media to the user, with just a few simple configurations required in the image for everything to work.

## Container Creation

To use this tool, you need to follow a few steps:

1. Configure the image.
2. Add your media.
3. Create the container.

### Step 1 - Configuring image files

The image configuration is used to ensure that your website is available to the entire onion network, and so that you can access your website remotely, so that you can maintain and control your hosting.

Replace the files in the folder with your onion server keys:
`source/configs/onion/keys/`

Add your site's hostname to the file:
`source/configs/onion/hostname`

Add your public SSH key to the file:
`source/configs/ssh/authorized_keys`

### Step 2 - Adding media

To add your content, simply enter the `source/www/media/` folder and add your files where you want them to be shared.

### Step 3 - Creating the container

After configuring and adding your media to the files, simply create your container so that your multimedia center on the onion network is ready for use.

To create the Docker image, run:
`docker build -t onion-media .`

To start a container with the created image, run:
`docker run -it --rm -p 22:22 -p 80:80 --name onion-media onion-media`

## After Creation

### Accessing your website

After the entire process, you can access your website locally at:
`http://localhost:80`

You can also remember your website's onion URL through the following link:
`http://localhost:80/hostname.tor`

And with your onion URL in hand, you can access your website, or use a TOR proxy to access your container via SSH.

### Limitations of SSH

For security reasons, the onion network and the operation of Docker, there are certain limitations related to SSH, including:

- Access to the server is via trusted public keys configured in the `source/configs/ssh/authorized_keys` file, and there is no possibility of connecting via passwords.

- SSH has a limit number of simultaneous connections, you can change this and other server settings in the `source/configs/ssh/sshd_config` file.

- As the connection is made via the TOR network, the connection tends to be slow.

- If you change the container used to host your website, when you try to connect via SSH again, your SSH client will recognize that it hears some change on the server when connecting, you can bypass the strict checking of the server keys and connect to the server, or delete the known keys from your SSH client:

    - Recommended option: To bypass strict key checking, run:
    `ssh -o StrictHostKeyChecking=no username@hostname`

    - To erase your SSH client's known keys, run:
    `rm ~/.ssh/known_hosts.old ~/.ssh/known_hosts`

    _Remembering that by ignoring the known SSH keys of your SSH client, or constantly deleting the file that maintains the keys known to your computer, you may be subject to attacks such as "MITM" or other similar attacks, which is why it is It is recommended not to change your used container unless strictly necessary._

    _Another safer alternative is to create a folder called keys in `source/configs/ssh/keys/` and save your SSH keys there, and modify the Dockerfile to add your SSH keys to your container image, this way, even with the creation of new containers, no you will need to bypass strict key checking or delete known hosts._
