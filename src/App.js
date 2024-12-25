import React from 'react';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import MahasiswaList from './components/MahasiswaList';
import AddMahasiswa from './components/AddMahasiswa';
import EditMahasiswa from './components/EditMahasiswa';
import About from './components/About';

function App() {
    return (
        <Router>
            <div className="container mt-5">
                <nav className="navbar navbar-expand-lg navbar-light bg-light mb-4">
                    <Link to="/" className="navbar-brand">CRUD Mahasiswa</Link>
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarNav">
                        <ul className="navbar-nav">
                            <li className="nav-item">
                                <Link to="/" className="nav-link">Home</Link>
                            </li>
                            <li className="nav-item">
                                <Link to="/add" className="nav-link">Add Mahasiswa</Link>
                            </li>
                            <li className="nav-item">
                                <Link to="/about" className="nav-link">About</Link>
                            </li>
                        </ul>
                    </div>
                </nav>
                <Routes>
                    <Route path="/" element={<MahasiswaList />} />
                    <Route path="/add" element={<AddMahasiswa />} />
                    <Route path="/edit/:nim" element={<EditMahasiswa />} /> {/* Sesuaikan dengan parameter 'nim' */}
                    <Route path="/about" element={<About />} />
                </Routes>
            </div>
        </Router>
    );
}

export default App;
