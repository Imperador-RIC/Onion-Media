# SYSTEM SETTINGS
FROM debian:latest

EXPOSE 22 80

WORKDIR /var/www/html

COPY www/ /var/www/html/

RUN apt update -y && \
    apt full-upgrade -y && \
    apt install -y --no-install-recommends openssh-server php tor

COPY start.sh /

ENTRYPOINT ["/./start.sh"]

# ONION SERVER
COPY configs/onion/torrc /etc/tor/torrc
COPY configs/onion/hostname /var/www/html/hostname.tor
COPY configs/onion/keys/* /var/lib/tor/hidden_service/

RUN chmod 700 /var/lib/tor/hidden_service/

# SSH SERVER
COPY configs/ssh/authorized_keys /root/.ssh/
COPY configs/ssh/sshd_config /etc/ssh/sshd_config

RUN chmod 700 /root/.ssh/
RUN chmod 700 /etc/ssh/sshd_config

# METADATA
LABEL title="Onion Media"
LABEL description="Image for quickly creating a website on the onion network, focused on media sharing"
LABEL author="Imperador RIC"

LABEL org.opencontainers.image.source="https://github.com/Imperador-RIC/Multimedia-Center"
LABEL org.opencontainers.image.licenses="Unlicense"
