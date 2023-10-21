import React, { useState } from "react";
import "./Login.scss";
import axios from "axios"
const LoginSection = () => {




  const [email, setEmail] = useState('');
const [password, setPassword] = useState('');
const [responsemessage, setResponsemessage] = useState('')


  const handleSubmit = async (e) =>{
    e.preventDefault();
const url = "http://localhost/login.php"
const fData  = new FormData();
fData.append('email',email);
fData.append('password',password);
try {
  const response = await
  axios.post(url,fData)
  setResponsemessage(response.data)
}
catch (error){
  console.error(error)
  //handle error
}

  };
  return (
    <>

      
       /* <form>
          <div>
                    <label>Email:</label>
                    <input
                        type="email"
                        name="email"
                        value={email}
                        onChange = {(e) => setEmail(e.target.value)}
                        required
                        id="email"
                        placeholder="valid email"

                                                
                    />
                </div>
                <div>
                    <label>Password:</label>
                    <input
                        type="password"
                        name="password"
                        value={password}
                        id="password"
                        placeholder=" prefered password"

                        onChange = {(e) => setPassword(e.target.value)}
                        required
                    />
                    </div>
                    </form>*/
                

                

      
    </>
    
  );
};

export default LoginSection;
