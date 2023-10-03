import { useEffect, useState } from "react";
import About from "../Pages/About/about";
import Contact from "../Pages/Contact/contact";
import FAQs from "../Pages/Faqs/Faq";
import HowItWorks from "../Pages/HowItWorks/HowItWorks";
import Navbar from "../Components/Navbar/Navbar";
import NotFound from "../Pages/NotFound/notfound";
import { createBrowserRouter, RouterProvider, Outlet } from "react-router-dom";
import LandingPage from "../Pages/LandingPage/LandingPage";
import SignupSection from "../Pages/LoginSignup/Signup/Signup";
import LoginSection from "../Pages/LoginSignup/Login/Login";

export const BaseRoutes = () => {
  const [showNavbar, setShowNavbar] = useState(true);
  // automatically logout a user when session expires

  const Layout = () => {
    return (
      <div className="app">
        {showNavbar && <Navbar />}
        <Outlet />
      </div>
    );
  };

  const router = createBrowserRouter([
    {
      path: "/",
      element: <Layout />,
      errorElement: <NotFound />,
      children: [
        {
          path: "/",
          element: <LandingPage />,
        },
        {
          path: "about",
          element: <About />,
        },
        {
          path: "contact",
          element: <Contact />,
        },

        {
          path: "faqs",
          element: <FAQs />,
        },

        {
          path: "howitworks",
          element: <HowItWorks />,
        },
      ],
    },

    {
      path: "login",
      element: <LoginSection />,
    },

    {
      path: "signup",
      element: <SignupSection />,
    },
  ]);

  return <RouterProvider router={router} />;
};
