<?php
    $connection = pg_connect(getenv("DATABASE_URL"));
    $query = "CREATE TABLE social_handles (
        social_handles_id varchar(255),
        github varchar(255),
        mail varchar(255),
        facebook varchar(255),
        instagram varchar(255),
        codechef varchar(255),
        codeforces varchar(255),
        linkedin varchar(255),
        hackerrank varchar(255),
        hackerearth varchar(255),
        twitter varchar(255),
        PRIMARY KEY (social_handles_id)       
    );";

    pg_query($connection,$query) ;

    $query = "CREATE TABLE member (
        name varchar(255),
        roll_no varchar(255),
        image longblob,
        description varchar(12000),
        member_id varchar(255),
        hof varchar(255),
        social_handles varchar(255),
        cred_id varchar(255),
        post varchar(255),
        wing varchar(255),
        session varchar(255),
        PRIMARY KEY (member_id),
        FOREIGN KEY (social_handles) REFERENCES social_handles(social_handles_id)   
    );";

    pg_query($connection,$query) ;

    $query = "CREATE TABLE past_members (
        name varchar(255),
        roll_no varchar(255),
        image longblob,
        descriptionvarchar(12000),
        member_id varchar(255),
        hof varchar(255),
        social_handles varchar(255),
        post varchar(255),
        wing varchar(255),
        session varchar(255),
        PRIMARY KEY (member_id),
        FOREIGN KEY (social_handles) REFERENCES social_handles(social_handles_id)   
    );";

    pg_query($connection,$query) ;

    $query = "CREATE TABLE credentials (
        credentialsID varchar(255),
        username varchar(255),
        password varchar(255),
        admin_valuevarchar(255),
        member_id varchar(255),
        PRIMARY KEY (credentialsID),
        FOREIGN KEY (member_id) REFERENCES member(member_id)   
    );";

    pg_query($connection,$query) ;

    $query = "CREATE TABLE wings (
        wing_id varchar(255),
        wing varchar(255),
        info varchar(12000),
        logo longblob,
        image longblob,                
        PRIMARY KEY (wing_id)
    );";

    pg_query($connection,$query) ;

    $query = "CREATE TABLE Projects (
        wing_id varchar(255),
        member_id varchar(255),
        project_name varchar(255),
        project_linkvarchar(255),
        blog_linkvarchar(255),
        source_code_linkvarchar(255),
        descriptionvarchar(12000),
        image longblob,        
        FOREIGN KEY (wing_id) REFERENCES wings(wing_id),
        FOREIGN KEY (member_id) REFERENCES member(member_id)
    );";

    pg_query($connection,$query) ;

    $query = "CREATE TABLE blogs (
        wing_id varchar(255),
        member_id varchar(255),
        blog_title varchar(255),
        descriptionvarchar(12000),
        blog_linkvarchar(255),        
        image longblob,        
        FOREIGN KEY (member_id) REFERENCES member(member_id),
        FOREIGN KEY (wing_id) REFERENCES wings(wing_id)        
    );";

    pg_query($connection,$query) ;

    $query = "CREATE TABLE announcements (
        member_id varchar(255),
        name varchar(255),
        organizervarchar(255),
        venuevarchar(255),        
        datevarchar(255),        
        timevarchar(255),        
        topicvarchar(255),        
        detailsvarchar(12000),        
        linkvarchar(255),        
        attachmentvarchar(255),        
        image longblob,        
        FOREIGN KEY (member_id) REFERENCES member(member_id)
    );";

    pg_query($connection,$query) ;

    $query = "CREATE TABLE contact (
        made_on varchar(255),
        first_name varchar(255),
        last_namevarchar(255),
        descriptionvarchar(12000),        
        emailvarchar(255),        
        mobilevarchar(255),        
        gendervarchar(255)               
    );";

    pg_query($connection,$query) ;
    
    $query = "INSERT INTO social_handles VALUES('00000','','','','','','','','','','')";
    $query_run = pg_query($connection,$query);                             
    $query = "INSERT INTO member VALUES ('', '', '', '', '22222', '', '00000', '11111', 'coordinator', 'exWing', '2020')";
    $query_run = pg_query($connection,$query);     
    $query = "INSERT INTO credentials VALUES('11111','exUser','exPass','1','22222')";
    $query_run = pg_query($connection,$query);
    $query = "INSERT INTO wings VALUES('33333','X','Only for Overall coordinators','')";
    $query_run = pg_query($connection,$query);

    echo "Database created";

?>