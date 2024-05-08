import Link from "next/link";
import "./navbar.css";

export default function Navbar() {
    const brand = "Feras.T.A"

    return (
        <>
            <div className="navbar navbar-expand-lg navbar-light bg-light">
                <p className="logo">{brand}</p>
                <nav  >
                    <ul className="navigation">
                        <li>
                            <Link className="navbar-brand" href="/">accueil</Link>
                        </li>
                        <li>
                            <Link className="navbar-brand" href="/trip">trips</Link>
                        </li>
                        <li>
                            <Link className="navbar-brand" href="/contact">contact</Link>
                        </li>
                    </ul>
                </nav>
            </div>

          
        </>
    );
}
