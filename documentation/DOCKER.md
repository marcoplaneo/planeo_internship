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

## Commands

- build: builds images from Dockerfile
- builder: manages builds
- commit: creates new images from changes made to container
- container: manages containers
- cp: copies files or folders
- create: creates new container
- diff: inspects changes to files or directories on container's filesystem
- exec: executes a command in running container
- export: exports a container's filesystem as tar archive
- history: shows history of image
- image: manages images
- images: lists images
- import: imports contents from tarball to create filesystem image
- info: displays system-wide info
- inspect: returns low-level info on Docker objects
- kill: kills one or more running containers
- load: loads image from tar archive or STDIN
- logs: fetches logs from container
- pause: pauses all processes within one or more containers
- plugin: manages plugins
- port: lists port mappings or specific mapping for container
- ps: lists containers
- pull: downloads image from registry
- rename: renames container
- restart: restarts one or more containers
- rm: removes one or more containers
- rmi: removes one or more images
- run: creates and runs new container from image
- save: saves one or more images to tar archive
- start: start one or more stopped containers
- stats: displays live stream of container resource usage statistics
- stop: stops one or more running containers
- system: manages Docker
- top: displays running processes of container
- trust: manages trust on Docker images
- unpause: unpauses all processes within one or more containers
- update: updates configuration of one or more containers
- version: shows Docker version information
- volume: manages volumes
- wait: blocks until one or more containers stop, then prints their exit codes