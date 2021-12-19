import React, { useState, useEffect } from "react";
import TitleScreen from "../components/intern/TitleScreen";
import BlogCard from "../components/intern/BlogCard";
import axios from "axios";
import { createClient } from "contentful";
import { URL } from "../components/Layout/Layout";

const Blog = _ => {
  const [blogEntries, setBlogEntries] = useState([])
  useEffect(() => {
    var client = createClient({
      space: "cjl0069kf3mf",
      accessToken: "IMlY2uj_8T2LHYlbq2Bq8LI14otz0WRz7MYOhb53wwo"
    });
    client.getEntries({ content_type: "blogPost" }).then(function (entries) {
      setBlogEntries(entries.items);
      entries.items.forEach(async element => {
        await axios.post(URL + "api/blog"+"?secret_token=" +
        sessionStorage.getItem("tokenPPP"), {
          key: element.sys.id,
          likes: 0,
          shares: 0
        });
      });
    });
  }, []);

  return (
    <div className="blog">
      <TitleScreen title="Blog" />
      <div className="blog-cards-container">
        {blogEntries.map((element, index) => (
          <BlogCard
            key={element.sys.id}
            name={element.fields.title}
            description={element.fields.description}
            img={element.fields.heroImage.fields.file.url}
            body={element.fields.body}
            index={index}
            id_content={element.sys.id}
            id_user={sessionStorage.getItem('idPPP')}
          />
        ))}
      </div>
    </div>
  );
};

export default Blog;
