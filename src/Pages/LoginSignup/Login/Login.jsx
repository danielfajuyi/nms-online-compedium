import React, { useState } from "react";
import "./Login.scss";
import axios from 'axios'

const LoginSection = () => {
  return (
    <>
      <section>Login

<div>   <form action="http://localhost/login.php">


<div>
  <label htmlFor="user">
    <input type="text" name="user" id="user" />
  </label>
</div>

<div>
  <label htmlFor="password">
    <input type="password" name="password" id="passsword" />
  </label>
</div>

</form>
  
  
  </div> 

      </section>
    </>
  );
};

export default LoginSection;
