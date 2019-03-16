using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using System.Web.Http.Description;
using laba2.Entitties;

namespace laba2.Controllers
{
    public class RequestsController : ApiController
    {
        public RequestsController()
        {
            db.Configuration.ProxyCreationEnabled = false;
        }
        private Laba2Entities1 db = new Laba2Entities1();

        // GET: api/Requests
        public IQueryable<Request> GetRequest()
        {
            return db.Request;
        }

        // GET: api/Requests/5
        [ResponseType(typeof(Request))]
        public IHttpActionResult GetRequest(int id)
        {
            Request request = db.Request.Find(id);
            if (request == null)
            {
                return NotFound();
            }

            return Ok(request);
        }

        // PUT: api/Requests/5
        [ResponseType(typeof(void))]
        public IHttpActionResult PutRequest(int id, Request request)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }

            if (id != request.ID_request)
            {
                return BadRequest();
            }

            db.Entry(request).State = System.Data.Entity.EntityState.Modified;

            try
            {
                db.SaveChanges();
            }
            catch (DbUpdateConcurrencyException)
            {
                if (!RequestExists(id))
                {
                    return NotFound();
                }
                else
                {
                    throw;
                }
            }

            return StatusCode(HttpStatusCode.NoContent);
        }

        // POST: api/Requests
        [ResponseType(typeof(Request))]
        public IHttpActionResult PostRequest(Request request)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }

            db.Request.Add(request);
            db.SaveChanges();

            return CreatedAtRoute("DefaultApi", new { id = request.ID_request }, request);
        }

        // DELETE: api/Requests/5
        [ResponseType(typeof(Request))]
        public IHttpActionResult DeleteRequest(int id)
        {
            Request request = db.Request.Find(id);
            if (request == null)
            {
                return NotFound();
            }

            db.Request.Remove(request);
            db.SaveChanges();

            return Ok(request);
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }

        private bool RequestExists(int id)
        {
            return db.Request.Count(e => e.ID_request == id) > 0;
        }
    }
}