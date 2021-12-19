import React, { useState } from "react";
import axios from "axios";
import { URL } from "../Layout/Layout";

const BlogCard = props => {
  const key = props.id_content;
  const [comments, setComments] = useState([]);
  const [comment, setComment] = useState("");
  const [data, setData] = useState({
    data: ""
  });

  const isLiked = (ids) => {
    const liked = ids.find(element => element == props.id_user)
    let likesIcon = document.querySelectorAll('.fa-thumbs-up')
    console.log(likesIcon)
    if(!liked){
      likesIcon.forEach((el)=> el.style.color= '#F4F4F8')
    }else{
      likesIcon.forEach((el)=> el.style.color= '#1E5F79')
    }
  }

  const renderModal = async () => {
    const modal = document.querySelectorAll(".blog-modal");
    modal[props.index].style.display = "flex";
    const res = await axios.get(URL + "api/blog/" + key + "?secret_token=" +
    sessionStorage.getItem("tokenPPP"));
    setData(res.data);
    console.log(res.data)
    isLiked(res.data.ids)
    setComments(res.data.comments);
  };
  const hideModal = () => {
    const modal = document.querySelectorAll(".blog-modal");
    document.querySelectorAll(".modal-info").forEach((e, index) => {
      document.querySelectorAll(".comment-input")[index].style.display = "none";
      document.querySelectorAll(".comment-button")[index].style.display =
        "none";
      e.scrollTo(0, 0);
    });
    modal[props.index].style.display = "none";
  };
  const handleInputChange = e => {
    setComment(e.target.value);
  };

  const countLikes = async () => {
    const res = await axios.put(URL + "api/blog/" + key + "/likes" + "?secret_token=" +
    sessionStorage.getItem("tokenPPP"), {
    id_user: props.id_user  
  });
    if(res.data.message){
      alert('Algo ha fallado, por favor vuelva a intentarlo')
      return
    }
  
    if (res.data.blog) {
      setData(res.data.blog);
      isLiked(res.data.blog.ids)
    }
  };

  const countShares = async () => {
    const res = await axios.put(URL + "api/blog/" + key + "/shares" + "?secret_token=" +
    sessionStorage.getItem("tokenPPP"));
    setData(res.data.message);
  };

  const modalNewComment = () => {
    document.querySelectorAll(".modal-info").forEach((e, index) => {
      document.querySelectorAll(".comment-input")[index].style.display =
        "block";
      document.querySelectorAll(".comment-button")[index].style.display =
        "block";
      e.scrollBy(0, 100);
    });
  };
  const sendComments = async () => {
    const res = await axios.put(URL + "api/blog/" + data.key + "/comment" + "?secret_token=" +
    sessionStorage.getItem("tokenPPP"), {
      comment: comment,
      id_user: props.id_user
    });
    document.querySelectorAll(".comment-input").forEach((e) => {
      e.value = ''
    }
    )
    setData(res.data.message);
    setComments(res.data.message.comments);
  };

  let commentsArr = comments.map(element => {
    return (
      <div className="comment-info" key={element.hora + element.dia}>
        <p>
          {" "}
          <span className="span-text">{element.name_user}</span> el{" "}
          {element.dia}:
        </p>
        <p>{element.comment}</p>
      </div>
    );
  });

  return (
    <div className="blog-card">
      <div className="blog-img-card-box">
        <img src={`https:${props.img}`} alt={props.alt} className="blog-img-card" />
      </div>
      <div className="blog-info-card">
        <div className="blog-info-card-text">
          <p className="highlight">{props.name}</p>
          <div className="blog-info-card-buttons">
            <div className="blog-description">
              <p>{props.description}</p>
            </div>
            <button className="blog-button-card" onClick={renderModal}>
              Ver más
            </button>
          </div>
        </div>
      </div>
      <div className="blog-modal">
        <div className="close-div">
          <i className="fas fa-times" onClick={hideModal}></i>
        </div>
        <div className="modal-info">
          <h2>{props.name}</h2>
          <img src={`https:${props.img}`} alt={props.alt} className="blog-info-img" />
          <h4>{props.description}</h4>
          <p>{props.body}</p>
          <div className="feedback-container">
            <div className="like-box">
              <p className="likes-cont">{data.likes}</p>
              <i className="fas fa-thumbs-up" onClick={countLikes}></i>
            </div>
            <button className="button-1 share-button" onClick={countShares}>
              Compartir
              <div className="social-container">
                <a
                  href={
                    "https://www.facebook.com/sharer/sharer.php?u=https%3A//devinmed.com/"
                  }
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  <i className="fab fa-facebook-f"></i>
                </a>
                <a
                  href="https://twitter.com/intent/tweet?text=Aqu%C3%AD%20va%20un%20texto%20del%20blog%0Ahttps%3A//devinmed.com/"
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  <i className="fab fa-twitter"></i>
                </a>
                <a
                  href="https://www.linkedin.com/shareArticle?mini=true&url=https%3A//devinmed.com/&title=PooPooPlease%20blog&summary=&source="
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  <i className="fab fa-linkedin-in"></i>
                </a>
              </div>
            </button>
            <button onClick={modalNewComment} className="button-1">
              Comentar
            </button>
          </div>
          <textarea
            className="comment-input"
            rows="5"
            onChange={handleInputChange}
            placeholder="Ingresa tu comentario"
            autoFocus
          />
          <button className="comment-button button-1" onClick={sendComments}>
            Enviar
          </button>
          <h4>Comentarios:</h4>
          <div className="comments-container">{commentsArr}</div>
        </div>
      </div>
    </div>
  );
};

export default BlogCard;
