FROM node:12
WORKDIR /usr/src/app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build
RUN ls -l
COPY build ./build
EXPOSE 3000
CMD ["node", "index.js"]