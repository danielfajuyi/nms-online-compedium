import React from "react";
import "./signup.css";
import  { useState } from 'react';
import axios from  "axios";



   
const RegisterForm = () => {
    const [res, setres] = useState('');
    const [showres, setshowres] = useState(false);

    const [user, setUser]  = useState('');
    const [fullname, setFullname]  = useState('');
    const [mobile, setMobile ]  = useState('');
    const [password, setPassword]  = useState('');
    const [email, setEmail]  = useState('');
  
    
    const handleSubmit =  (e) => {
        e.preventDefault();

        //cleint side Authentication






        // Send a POST request to the server to handle user registration
    const url = "http://localhost/fetch.php";
    let fData = new FormData();
    fData.append('user', user );
    fData.append('fullname', fullname );
    fData.append('mobile', mobile );
    fData.append('password', password ); 
    fData.append('email', email );


  axios.post(url,fData)
  //handle response
   .then((Response) => {
            setres(Response.data);
            setshowres('true');
        })
        //handle server error 
    .catch((error)=>{
        console.error("registration error:", error);
        setres('A server error has occured');
        setshowres(true);
    });

}   
    
        


    
     


      
    

    return (
        <div className="sicontainer">
            <h2>User Registration</h2>
            <form onSubmit={handleSubmit}>
            <div>
                    <label>fullname</label>
                    <input
                        type="text"
                        name="fullname"
                        value={fullname}
                        onChange = {(e) => setFullname(e.target.value)}
                        id="fullname"
                        placeholder=" "
                        required
                    />
                </div>
                <div>
                    <label>Username:</label>
                    <input
                        type="text"
                        name="user"
                        value={user}
                        onChange = {(e) => setUser(e.target.value)}
                        required
                        id="user"
                        placeholder=" "

                    />
                </div>
                <div>
                    <label>Email:</label>
                    <input
                        type="email"
                        name="email"
                        value={email}
                        onChange = {(e) => setEmail(e.target.value)}
                        required
                        id="email"
                        placeholder=""

                                                
                    />
                </div>
                <div>
                    <label>Password:</label>
                    <input
                        type="password"
                        name="password"
                        value={password}
                        id="password"
                        placeholder=" "

                        onChange = {(e) => setPassword(e.target.value)}
                        required
                    />
                </div>
                <div>
                    <label>mobile:</label>
                    <input
                    onChange = {(e) => setMobile(e.target.value)}
                        type="tel"
                        name="mobile"
                        value={mobile}
                        id="mobile"
                        placeholder=""

                        required
                    />
                </div>
                <button type="submit">Register</button>
            </form>
            {showres && (
                <div className="popup">

<p>{res}</p>
<button onClick={()=>setshowres(false)}>Close</button>
                </div>

            )

            }
            </div>

            
           ); 
        }

           
export default RegisterForm;


        
