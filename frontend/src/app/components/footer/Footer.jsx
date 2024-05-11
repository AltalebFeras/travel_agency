import Link from "next/link";
import "./footer.css";

export default function Footer() {
  return (
    <div
      className="d-flex   justify-content-end bg-light align-items-center
        p-3 footer my-3 gap-3"
    >
      <Link className="navbar-brand  " href="/">
        Our engagements
      </Link>
      <Link className="navbar-brand " href="/">
        Legal Notice
      </Link>
    </div>
  );
}
