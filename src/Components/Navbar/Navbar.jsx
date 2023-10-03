import React from "react";
import {
  Nav,
  NavLink,
  Bars,
  NavMenu,
  NavBtn,
  NavBtnLink,
} from "./NavElement/NavbarElements";

const Navbar = () => {
  return (
    <>
      <Nav>
        <NavLink to="/">
          <img
            style={{ width: "50px", height: "50px", objectFit: "center" }}
            src="./images/nms-logo/nms-logo.webp"
            alt="logo"
          />
        </NavLink>
        <Bars />
        <NavMenu>
          <NavLink to="/" activeStyle>
            Home
          </NavLink>
          <NavLink to="/about" activeStyle>
            About
          </NavLink>
          <NavLink to="/faqs" activeStyle>
            Faqs
          </NavLink>
          <NavLink to="/howitworks" activeStyle>
            How It Works
          </NavLink>
          <NavLink to="/contact" activeStyle>
            Contact Us
          </NavLink>
          {/* Second Nav */}
          {/* <NavBtnLink to='/sign-in'>Sign In</NavBtnLink> */}
        </NavMenu>
        <div style={{ display: "flex", alignItems: "center", gap: "1rem" }}>
          <NavBtn>
            <NavBtnLink to="/login">Login</NavBtnLink>
          </NavBtn>
          <NavBtn>
            <NavBtnLink to="/signup">Sign up</NavBtnLink>
          </NavBtn>
        </div>
      </Nav>
    </>
  );
};

export default Navbar;
