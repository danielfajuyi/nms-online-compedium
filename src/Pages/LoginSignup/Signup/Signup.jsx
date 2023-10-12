import React from "react";
import "./Signup.css";
import  { useState } from 'react';
import axios from  "axios";



   
const RegisterForm = () => {
    const [user, setUser]  = useState('');
    const [fullname, setFullname]  = useState('');
    const [mobile, setMobile ]  = useState('');
    const [password, setPassword]  = useState('');
    const [email, setEmail]  = useState('');
    







    const handleSubmit = (e) => {
        e.preventDefault();
        // Send a POST request to the server to handle user registration
    const url = "http://localhost/fetch.php";
    let fData = new FormData();
    fData.append('user', user );
    fData.append('fullname', fullname );
    fData.append('mobile', mobile );
    fData.append('password', password );
    fData.append('email', email );
    axios.post(url, fData)
    //handle response from server
    .then(Response=> alert(Response.data))
    .catch(error=>{ console.log(error)});


      
    };

    return (
        <div>
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
                        placeholder="ENTER your fullname"
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
                        placeholder="ENTER your prefered username"

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
                        placeholder="ENTER a valid email"

                                                
                    />
                </div>
                <div>
                    <label>Password:</label>
                    <input
                        type="password"
                        name="password"
                        value={password}
                        id="password"
                        placeholder="set your prefered password"

                        onChange = {(e) => setPassword(e.target.value)}
                        required
                    />
                </div>
                <div>
                    <label>mobile:</label>
                    <input
                    onChange = {(e) => setMobile(e.target.value)}
                        type="phone"
                        name="mobile"
                        value={mobile}
                        id="mobile"
                        placeholder="ENTER your mobile Number"

                        required
                    />
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
    );
};

export default RegisterForm;


  
