import Link from "next/link";
import "./navbar.css";

import Button from "react-bootstrap/Button";
import Container from "react-bootstrap/Container";
import Form from "react-bootstrap/Form";
import Nav from "react-bootstrap/Nav";
import Navbar from "react-bootstrap/Navbar";
import NavDropdown from "react-bootstrap/NavDropdown";

function NavScrollExample() {
  return (
    <Navbar expand="lg" className="bg-body-tertiary">
      <div>
        <Navbar.Brand>
          <img
            className="logoImg"
            src="https://i.ibb.co/y4X7N74/logo.png"
            alt=""
          />
        </Navbar.Brand>
      </div>
      <div >
        <Container fluid className="containerFluid">
          <Navbar.Toggle aria-controls="navbarScroll" />
          <Navbar.Collapse id="navbarScroll">
            <Nav
              className="me-auto my-2 my-lg-0 NavLinks"
              style={{ maxHeight: "130px" }}
              navbarScroll
            >
              <Link className="btn btn-light" href="/">
                Home
              </Link>
              <Link className="btn btn-light" href="/trip">
                Trips
              </Link>
              <Link className="btn btn-light" href="/contact">
                Contact us
              </Link>
            </Nav>
          </Navbar.Collapse>
        </Container>
      </div>
    </Navbar>
  );
}

export default NavScrollExample;
