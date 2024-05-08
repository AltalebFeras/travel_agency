import Link from "next/link";
import "./navbar.css";

export default function Navbar() {
    const brand =<Link className="navbar-brand" href="/"><img src="https://i.ibb.co/y4X7N74/logo.png" alt="" /></Link>

    return (
        <>
            <div className="navbar navbar-expand-lg navbar-light bg-light">
                <p className="logo">{brand}</p>
                <nav  >
                    <ul className="navigation">
                        <li>
                            <Link className="navbar-brand btn btn-light" href="/">Accueil</Link>
                        </li>
                        <li>
                            <Link className="navbar-brand btn btn-light" href="/trip">Trips</Link>
                        </li>
                        <li>
                            <Link className="navbar-brand btn btn-light" href="/contact">Contact US</Link>
                        </li>
                    </ul>
                </nav>
            </div>

          
        </>
    );
}
