# SuperNova Framework

SuperNova is a lightweight PHP application framework created to explore backend framework architecture, request lifecycles, and modular system design.

The goal of this project is not to compete with established frameworks, but to better understand how common backend framework components are structured and how design trade-offs affect maintainability, extensibility, and performance.

## Architectural Focus

SuperNova is structured around a modular MVC-style architecture with clear separation of concerns. Key architectural areas explored in this project include:

- Front controller pattern and request lifecycle handling
- Routing and URL resolution
- Modular application structure
- Configuration and extensibility mechanisms
- Separation between core framework logic and application code

The framework intentionally remains lightweight to make architectural decisions explicit and easier to reason about.

## Design Philosophy

SuperNova draws inspiration from frameworks such as Laravel and CodeIgniter, while avoiding unnecessary abstraction layers. The emphasis is on:

- Readability over cleverness
- Explicit structure over hidden magic
- Simplicity over feature completeness

This approach allows the framework to serve as a learning and experimentation platform for backend system design rather than a full production replacement.

## Project Structure

- `core/` – core framework logic including routing and request handling
- `app/` – application-level code
- `assets/` – static assets
- `index.php` – application entry point (front controller)

## Usage Notes

This project is primarily intended for exploration and experimentation with backend framework concepts. While functional, it is not positioned as a production-ready alternative to mature frameworks.

## License

MIT
