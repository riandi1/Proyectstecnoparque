import React from "react";
import Link from "next/link";

const Navigation = () => {
  return (
    <div className="nav">
      <div className="button-nav button-nav-left">
        <Link  href="/user">
          <a className="link-nav">
            <i className="fas fa-user"></i>
          </a>
        </Link>
      </div>
      <div className="button-nav button-nav-middle-l">
        <Link  href="/">
          <a className="link-nav">
            <i className="fas fa-home"></i>
          </a>
        </Link>
      </div>
      <div className="button-nav button-nav-middle-r">
        <Link  href="/blog">
          <a className="link-nav">
            <i className="far fa-newspaper"></i>
          </a>
        </Link>
      </div>
      <div className="button-nav button-nav-middle-r2">
        <Link  href="/help">
          <a className="link-nav">
            <i className="far fa-question-circle"></i>
          </a>
        </Link>
      </div>
      <div className="button-nav button-nav-right">
        <Link className="link-nav" href="/connect">
        <a className="link-nav">
          <i className="fas fa-plug"></i>
          </a>
        </Link>
      </div>
    </div>
  );
};

export default Navigation;
