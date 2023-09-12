# Docker

## Container

- sandboxed process
- running on host machine
- isolated from other processes running on the host machine
- runnable instance of image
  - API
  - CLI
- portable
- extended version of chroot
- one container per port at a time
- to update a container, old version has to be stopped or removed
- each container has own IP
- connect multiple to database to have same data on all of them

## Image

- running container uses isolated filesystem
  - provided by an image
    - must contain everything needed to run application
    - contains other configurations for container

## Volume

- managed by Docker
- Volumes
  - Data is not lost when container is deleted
  - Data of one container is now available for other containers
- Mounting (Volume Mount)
  - creating a volume and attaching it to directory
  - persist data
    - even after making new docker

## Bind Mount

- share host's filesystem into container
- mount source into container
- container sees changes immediately after saving
  - can run container that watch for filesystem changes and respond to them
- often used for local development setups

## Compose

- define everything in a file
- management is easier