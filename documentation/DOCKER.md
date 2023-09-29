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

## Dockerfile Syntax

- INSTRUCTION argument
  - instructions usually in UPPERCASE to distinguish them from arguments
- comments
```dockerfile
# This is a comment
This # is an argument
```
- environment variables
```dockerfile
$var_name
${var_name}
```
- commands
  - FROM: initializes new build stage and specifies parent image from which is built
    - needs at least one argument
    - must be included in Dockerfile
    - new FROM clears state of previous instructions
  - RUN
    - execute in new layer on top of current image
  ```dockerfile
  # shell form
  RUN command
  
  #exec form
  RUN ["executable", "param1", "param2"]
  ```
  - CMD
    - provide defaults for executing container
      - can include executable
        - must specify ENTRYPOINT
    - sets command to be executed when running image
    - only one CMD command per Dockerfile
      - if more, only last will take effect
  ```dockerfile
  # exec form (preferred)
  CMD ["executable", "param1", "param2"]
  
  # default parameters to ENTRYPOINT
  CMD ["param1", "param2"]
  
  # shell form
  CMD command param1 param2
  ```
  - LABEL
    - adds metadata to image
    - key-value pair
    - can have more than one
      - can specify multiple in one line
    - most recently label overwrites same older label with different value
  ```dockerfile
  LABEL key=value key=value ...
  ```
  - EXPOSE
    - specifies container to listen on specific port
  ```dockerfile
  EXPOSE port [port/protocol...]
  
  # example
  EXPOSE 80/udp
  ```
  - ENV
    - value of key will be in environment for subsequent instructions
  ```dockerfile
  ENV key=value
  ```
  - ADD
    - copies new files, directories and remote file URLs from \<src> and adds to filesystem of images at path \<dest>
  ```dockerfile
  ADD [--chown=user:group] [--chmod=perms] [--checksum=checksum] <src>... <dest>
  ADD [--chown=user:group] [--chmod=perms] ["<src>",... "<dest>"]
  ```
  - COPY
    - copies files or directories from \<src> and adds to filesystem of container at path \<dest>
  ```dockerfile
  COPY [--chown=user:group] [--chmod=perms] <src>... <dest>
  COPY [--chown=user:group] [--chmod=perms] ["<src>",... "<dest>"]
  ```
  - ENTRYPOINT
    - configure container to run as executable
  ```dockerfile
  # exec form
  ENTRYPOINT ["executable", "param1", "param2"]
  
  # shell form
  ENTRYPOINT command param1 param2
  ```
  - VOLUME
    - creates mount point
  ```dockerfile
  VOLUME ["/data"]
  ```
  - WORKDIR
    - sets working directory
      - if it doesn't exist, it will be created
    - can be used multiple times in Dockerfile
  ```dockerfile
  WORKDIR /path/to/workdir
  ```
  - ONBUILD
    - adds trigger instruction to image to be executed at later time, when image is used as base for another build
  ```dockerfile
  ONBUILD INSTRUCTION
  ```

## Compose

- define everything in a file
- management is easier

## Compose File Structure

- acceptable file names:
  - compose.yaml
  - compose.yml
  - docker-compose.yaml
  - docker-compose.yml
- Version (optional)
- Top-level elements
  - Services (required)
    - computing resource within application
    - backed by containers
    - defined by Docker image
    - set of runtime arguments
    - map whose keys are string representation of service names
      - values are service definitions
        - contains configuration that is applied to each service container
    - include build section
      - defines how to create Docker image for service
    - config section
      - allows services to adapt behaviour without rebuilding Docker image
    - deploy section
      - specifies configuration for deployment and lifecycle of services
    - environment section
      - defines environment variables set in container
    - expose section
      - defines exposed ports from container
    - image section
      - specifies image to start container from
    - labels section
      - adds metadata to containers
    - ports section
      - exposes container ports
    - secrets section
      - grants access to sensitive data defined by secrets
    - volumes section
      - defines mount host paths or named volumes that are accessible by service containers
    - working_dir section
      - overrides container's working directory
  - Networks
    - layer that allows services communication with each other
    - lets you configure named networks
      - can be reused across multiple services
  - Volumes
    - persistent data stores
    - lets you configure named volumes
      - can be reused across multiple services
  - Configs
    - allows services to adapt their behaviour without need to rebuild Docker image
  - Secrets
    - flavor of Configs focusing on sensitive data