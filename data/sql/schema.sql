CREATE TABLE tag (id BIGINT AUTO_INCREMENT, name VARCHAR(140) NOT NULL UNIQUE, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tweet (id BIGINT AUTO_INCREMENT, text VARCHAR(140) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tweet_tag_assoc (id BIGINT AUTO_INCREMENT, tweet_id BIGINT, tag_id BIGINT, INDEX tweet_id_idx (tweet_id), INDEX tag_id_idx (tag_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE tweet_tag_assoc ADD CONSTRAINT tweet_tag_assoc_tweet_id_tweet_id FOREIGN KEY (tweet_id) REFERENCES tweet(id);
ALTER TABLE tweet_tag_assoc ADD CONSTRAINT tweet_tag_assoc_tag_id_tag_id FOREIGN KEY (tag_id) REFERENCES tag(id);
