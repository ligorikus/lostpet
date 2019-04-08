---Notes routes---

get: '/notes'  -  get a notes list
  response:
    data: 
      notes: #list of notes
        fields:
          title
          description
          created_at
          updated_at
        relations:
          images
      
get: '/notes/{note}'  -  get a note with id {note}
  response:
    data:
      note: #data of note
        fields:
          title
          description
          created_at
          updated_at
        relations:
          images

post: '/notes' - store a new note.
  request:
    address: required, string, max:255
    title: nullable, string, max:255
    description: nullable, text
    images: array  # array contains a list of image ids
  response:
    data:
      note: #data of new note
        fields:
          title
          description
          created_at
          updated_at
        relations:
          images
    
---Images routes---
post: 'image' - post a new image
  request:
    image: required, image
  response:
    image #created image object
