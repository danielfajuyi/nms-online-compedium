import React, { useState } from "react";
import "./Login.scss";
import { FaFacebook, FaLinkedinIn, FaTwitter, faTwitter } from "react-icons/fa";

const LoginSection = () => {
  return (
    <>
      <section>
        <div classNameName="main">
          <div className="container a-container" id="a-container">
            <form className="form" id="a-form" method="" action="">
              <h2 className="form_title title">Create Account</h2>
              <div className="form__icons">
                <FaTwitter size={50} />
                <FaFacebook size={50} />
                <FaLinkedinIn size={50} />
              </div>
              <span className="form__span">or use email for registration</span>
              <input className="form__input" type="text" placeholder="Name" />
              <input className="form__input" type="text" placeholder="Email" />
              <input
                className="form__input"
                type="password"
                placeholder="Password"
              />
              <button className="form__button button submit">SIGN UP</button>
            </form>
          </div>
        </div>
      </section>
    </>
  );
};

export default LoginSection;
