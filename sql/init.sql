CREATE TABLE IF NOT EXISTS cross_pages_references
(
    page_title      varbinary(65535)    NOT NULL,
    label           varbinary(4095)    NOT NULL,
    display_tag   varbinary(255)    NOT NULL,
    PRIMARY KEY (page_title(255), label(255))
)DEFAULT CHARSET binary;