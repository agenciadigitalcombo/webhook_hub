
CREATE TABLE events (
    id int NOT NULL AUTO_INCREMENT,
    data varchar(255),
    channel varchar(255),
    body text,
    PRIMARY KEY (id)
);

CREATE TABLE subscribers (
    id int NOT NULL AUTO_INCREMENT,
    data varchar(255),
    channel varchar(255),
    url varchar(255),
    PRIMARY KEY (id)
);

CREATE TABLE sent (
    id int NOT NULL AUTO_INCREMENT,
    data varchar(255),
    channel varchar(255),
    url varchar(255),
    body text,
    status_code varchar(255),
    PRIMARY KEY (id)
);