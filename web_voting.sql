CREATE DATABASE website_voting;
USE website_voting;

CREATE TABLE voters (
    voter_id INT AUTO_INCREMENT PRIMARY KEY,
    voter_username VARCHAR(60) UNIQUE NOT NULL,
    voter_password VARCHAR(255) NOT NULL,
    voter_full_name VARCHAR(120) NOT NULL,
    voter_email VARCHAR(150),
    has_voted TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE candidates (
    candidate_id INT AUTO_INCREMENT PRIMARY KEY,
    candidate_name VARCHAR(100) NOT NULL,
    candidate_position VARCHAR(80) NOT NULL,
    candidate_description VARCHAR(300),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE votes (
    vote_id INT AUTO_INCREMENT PRIMARY KEY,
    voter_id INT NOT NULL,
    candidate_id INT NOT NULL,
    vote_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (voter_id) REFERENCES voters(voter_id),
    FOREIGN KEY (candidate_id) REFERENCES candidates(candidate_id)
);





